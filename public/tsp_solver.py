from __future__ import print_function
import math
from ortools.constraint_solver import routing_enums_pb2
from ortools.constraint_solver import pywrapcp


def create_data_model():
    """Stores the data for the problem."""
    data = {}
    # Locations with names, longitude, and latitude
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


def compute_haversine_distance_matrix(locations):
    """Creates callback to return distance between points using Haversine formula."""
    distances = {}
    for from_counter, from_node in enumerate(locations):
        distances[from_counter] = {}
        for to_counter, to_node in enumerate(locations):
            if from_counter == to_counter:
                distances[from_counter][to_counter] = 0
            else:
                # Haversine distance
                distances[from_counter][to_counter] = int(
                    haversine(from_node[1:], to_node[1:]))
    return distances


def haversine(coord1, coord2):
    """Haversine formula to calculate the great-circle distance between two points."""
    # Radius of the Earth in kilometers
    R = 6371.0

    lat1, lon1 = math.radians(coord1[0]), math.radians(coord1[1])
    lat2, lon2 = math.radians(coord2[0]), math.radians(coord2[1])

    dlat = lat2 - lat1
    dlon = lon2 - lon1

    a = math.sin(dlat / 2)**2 + math.cos(lat1) * math.cos(lat2) * math.sin(dlon / 2)**2
    c = 2 * math.atan2(math.sqrt(a), math.sqrt(1 - a))

    distance = R * c

    return distance * 1000  # Convert to meters


def print_solution(manager, routing, solution, locations):
    """Prints solution on console."""
    print('Objective: {} meters'.format(solution.ObjectiveValue()))
    index = routing.Start(0)
    plan_output = 'Route:\n'
    route_distance = 0
    route_nodes = []
    while not routing.IsEnd(index):
        plan_output += ' {} ->'.format(manager.IndexToNode(index))
        route_nodes.append(index)
        previous_index = index
        index = solution.Value(routing.NextVar(index))
        route_distance += routing.GetArcCostForVehicle(previous_index, index, 0)
    plan_output += ' {}\n'.format(manager.IndexToNode(index))
    route_nodes.append(index)
    print(plan_output)
    plan_output += 'Objective: {} meters\n'.format(route_distance)

    # Display names of locations in the route
    route_names = [locations[manager.IndexToNode(i)][0] for i in route_nodes]
    print("Route Names:", route_names)

def main():
    """Entry point of the program."""
    # Instantiate the data problem.
    data = create_data_model()

    # Create the routing index manager.
    manager = pywrapcp.RoutingIndexManager(len(data['locations']),
                                           data['num_vehicles'], data['depot'])

    # Create Routing Model.
    routing = pywrapcp.RoutingModel(manager)

    distance_matrix = compute_haversine_distance_matrix(data['locations'])

    def distance_callback(from_index, to_index):
        """Returns the distance between the two nodes."""
        return distance_matrix[from_index][to_index]

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
        print_solution(manager, routing, solution, data['locations'])


if __name__ == '__main__':
    main()
