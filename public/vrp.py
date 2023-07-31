from ortools.constraint_solver import routing_enums_pb2
from ortools.constraint_solver import pywrapcp


def create_data_model():
    """Stores the data for the problem."""
    data = {}
    # Locations with names and coordinates
    data['locations'] = [
    ('nagdhunga, Kathmandu', 27.7066036, 85.2055865),
    ('Kalimati', 27.712021, 85.312950),
    ('Thankot, Kathmandu', 27.712020, 85.312950),
    ('Balaju', 27.7270105, 85.3045555),
    ('DHulikhel', 27.6176558, 85.5634955),
    ('Patan Durbar Square, Lalitpur', 27.6734454, 85.325035),
    ('Swayambhunath (Monkey Temple), Kathmandu', 27.7149388, 85.2903913),
    ('Chobhar, Kathmandu', 27.6553409, 85.2812598),
    # ('Pulchowk, Lalitpur', 27.719391, 85.325951),  # Remove this duplicate entry
    # ('Balaju, Kathmandu', 27.711017, 85.302136)
]
    data['num_vehicles'] = 1
    data['depot'] = 0
    return data


def compute_distance_matrix(locations):
    """Creates distance matrix for Euclidean distances."""
    num_locations = len(locations)
    distance_matrix = {}
    for from_node in range(num_locations):
        distance_matrix[from_node] = {}
        for to_node in range(num_locations):
            if from_node == to_node:
                distance_matrix[from_node][to_node] = 0
            else:
                lat1, lon1 = locations[from_node][1], locations[from_node][2]
                lat2, lon2 = locations[to_node][1], locations[to_node][2]
                # Euclidean distance
                distance_matrix[from_node][to_node] = haversine(lat1, lon1, lat2, lon2)
    return distance_matrix


def haversine(lat1, lon1, lat2, lon2):
    """Calculate the great circle distance between two points on the earth (specified in decimal degrees)."""
    from math import radians, sin, cos, sqrt, atan2

    # Convert decimal degrees to radians
    lat1, lon1, lat2, lon2 = map(radians, [lat1, lon1, lat2, lon2])

    # Haversine formula
    dlat = lat2 - lat1
    dlon = lon2 - lon1
    a = sin(dlat/2)**2 + cos(lat1) * cos(lat2) * sin(dlon/2)**2
    c = 2 * atan2(sqrt(a), sqrt(1-a))
    R = 6371  # Radius of the earth in kilometers. Use 3956 for miles.
    distance = R * c
    return distance


def main():
    """Entry point of the program."""
    # Instantiate the data problem.
    data = create_data_model()

    # Create the distance matrix.
    distance_matrix = compute_distance_matrix(data['locations'])

    # Create routing index manager.
    manager = pywrapcp.RoutingIndexManager(len(distance_matrix), data['num_vehicles'], data['depot'])

    # Create routing model.
    routing = pywrapcp.RoutingModel(manager)

    def distance_callback(from_index, to_index):
        """Returns the distance between the two nodes."""
        return distance_matrix[manager.IndexToNode(from_index)][manager.IndexToNode(to_index)]

    transit_callback_index = routing.RegisterTransitCallback(distance_callback)

    # Define cost of each arc.
    routing.SetArcCostEvaluatorOfAllVehicles(transit_callback_index)

    # Setting first solution heuristic.
    search_parameters = pywrapcp.DefaultRoutingSearchParameters()
    search_parameters.first_solution_strategy = (
        routing_enums_pb2.FirstSolutionStrategy.PATH_CHEAPEST_ARC)

    # Solve the problem.
    solution = routing.SolveWithParameters(search_parameters)

    # Print solution on console.
    if solution:
        print('Objective: {} km'.format(solution.ObjectiveValue()))
        index = routing.Start(0)
        plan_output = 'Route:\n'
        route_distance = 0
        while not routing.IsEnd(index):
            plan_output += ' {} ->'.format(data['locations'][manager.IndexToNode(index)][0])
            previous_index = index
            index = solution.Value(routing.NextVar(index))
            route_distance += routing.GetArcCostForVehicle(previous_index, index, 0)
        plan_output += ' {}\n'.format(data['locations'][manager.IndexToNode(index)][0])
        print(plan_output)
        print('Objective: {} km'.format(route_distance))


if __name__ == '__main__':
    main()
