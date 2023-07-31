import requests

def get_route(api_key, coordinates):
    base_url = "https://api.geoapify.com/v1/routing"
    waypoints = '|'.join([f"{coord['longitude']},{coord['latitude']}" for coord in coordinates])

    params = {
        "apiKey": api_key,
        "waypoints": waypoints,
        "mode": "driving-car",  # You can change the mode (e.g., "walking", "cycling", etc.)
        "optimize": "shortest",
        "format": "json",
    }

    response = requests.get(f"{base_url}/optimize", params=params)

    if response.status_code == 200:
        data = response.json()
        if data.get('features') and data['features'][0].get('geometry'):
            return data['features'][0]['geometry']['coordinates']
    return None

def main():
    api_key = "3082d9f8f08846a987a1c0a3ed4ecd05"
    locations = [
        {'latitude': 27.704910, 'longitude': 85.322080},  # Pulchowk, Lalitpur
        {'latitude': 27.719787, 'longitude': 85.302361},  # Thamel, Kathmandu
        {'latitude': 27.693010, 'longitude': 85.313210},  # Patan Durbar Square, Lalitpur
        {'latitude': 27.725065, 'longitude': 85.338509},  # Swayambhunath (Monkey Temple), Kathmandu
        {'latitude': 27.697905, 'longitude': 85.330494},  # Jawalakhel, Lalitpur
        {'latitude': 27.709970, 'longitude': 85.343527},  # Babar Mahal, Kathmandu
        {'latitude': 27.728816, 'longitude': 85.329346},  # Chobhar, Kathmandu
        {'latitude': 27.729884, 'longitude': 85.299910},  # Nagarjun, Kathmandu
        {'latitude': 27.711017, 'longitude': 85.302136},  # Balaju, Kathmandu
    ]

    # Add the starting location at the end to make a loop
    locations.append(locations[0])

    optimized_route = get_route(api_key, locations)

    if optimized_route:
        print("Optimized Route (latitude, longitude):")
        for coord in optimized_route:
            print(coord)

if __name__ == "__main__":
    main()
