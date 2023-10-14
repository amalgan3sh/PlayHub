<!-- banner -->

<?php

    $api_key = 'c6946bb4fed700526c2b2805842aa5d7';
    $location = 'alappuzha'; // Replace with your desired location

    $api_url = "http://api.weatherstack.com/current?access_key=$api_key&query=$location";

    $response = file_get_contents($api_url);

    if ($response) {
        $weather_data = json_decode($response, true);
        // You can extract weather information from $weather_data as needed
        $temperature = $weather_data['current']['temperature'];
        $weather_description = $weather_data['current']['weather_descriptions'][0];
        // You can access more data as well
    } else {
        // Handle error in case the API request fails
    }

?>

<div class="banner layer" id="home">
    <div class="container">
        <div class="row banner-text">
            <div class="slider-info col-lg-8">
                <div class="agileinfo-logo mt-5">
                    <h2 data-aos="fade-down">
                        <span class="fab fa-blackberry text-center"></span> Turf Booking -
                    </h2>
                </div>
                <h3 class="txt-w3_agile" data-aos="fade-down">User Landing Page</h3>
                <!-- Display Weather Information Here -->
                
                <!-- End Weather Information -->
                <a class="btn mt-4 mr-2 text-capitalize" data-aos="fade-up" href="#" data-toggle="modal" data-target="#exampleModalCenter1" role="button">read more</a>
                <a class="btn mt-4 text-capitalize" data-aos="fade-up" href="#" data-toggle="modal" data-target="#exampleModal" role="button">watch video <i class="fas fa-play-circle"></i></a>
            </div>
            <div class="weather-info" data-aos="fade-up">
                <p style="font-size:30px; font-family: ;">Current Weather</p>
                <p>Temperature: <?php echo "$temperature"; ?>°C</p>
                <p>Weather: <?php echo $weather_description; ?></p>
 
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
</header>


 <!-- Add your CSS styles or link to external stylesheets here -->
    <style>
    /* Add your custom CSS styles here */
    .weather-info {
        background-color: rgba(240, 240, 240, 0.7); /* Transparent background */
        padding: 10px;
        border-radius: 5px;
        margin-top: 20px;
        text-align: center; /* Center-align the text */
    }

    .weather-info p {
        margin: 0;
        font-size: 20px; /* Adjust the font size as needed */
    }
    </style>

