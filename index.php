<!DOCTYPE html>
<html>
<title>Flight Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="css/flightsearch.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="flight.js"></script>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="images/logo.png" alt="Greyhawk Travel and Tours Logo" style="height: 40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tour_packages.php">Holiday</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="flightsearch-form.php">Flights</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Hotels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact_us.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>


    <div class="container">
        <div class="card custom-bg w-75 p-4 d-flex">
            <div class="row">
                <div class="pb-3 h3 text-left">Flight Search &#128747;</div>
            </div>
            <form id="flight-form" onsubmit="return validateForm()">
                <div class="row">
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="origin" class="d-inline-flex">From</label>
                        <input type="text" placeholder="City or Airport" class="form-control" id="origin" name="origin"
                            required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="depart" class="d-inline-flex">To</label>
                        <input type="text" placeholder="City or Airport" class="form-control" id="depart" name="depart"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="departure-date" class=" d-inline-flex">Depart</label>
                        <input type="date" class="form-control" id="departure-date" name="departure-date"
                            onkeydown="return false" required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="return-date" class="d-inline-flex">Return</label>
                        <input type="date" placeholder="One way" value=""
                            onChange="this.setAttribute('value', this.value)" class="form-control" id="return-date"
                            name="return-date">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3 align-items-start flex-column">
                        <label for="adults" class="d-inline-flex col-auto">Adults <span class="sublabel"> 12+
                            </span></label>
                        <select class="form-select" id="adults"
                            onchange="javascript: dynamicDropDown(this.options[this.selectedIndex].value);">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 align-items-start flex-column">
                        <label for="children" class="d-inline-flex col-auto">Children <span class="sublabel"> 2-11
                            </span></label>
                        <select class="form-select" id="children">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 align-items-start flex-column">
                        <label for="infants" class="d-inline-flex col-auto">Infants <span class="sublabel"> less than
                                2</span></label>
                        <select class="form-select" id="infants">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 align-items-start flex-column">
                        <label for="cabin" class="d-inline-flex">Cabin</label>
                        <select class="form-select" id="cabin">
                            <option value="ECONOMY">Economy</option>
                            <option value="PREMIUM_ECONOMY">Premium Economy</option>
                            <option value="BUSINESS">Business</option>
                            <option value="FIRST">First</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 align-items-start flex-column pt-lg-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input align-self-center" type="checkbox" id="directFlights">
                            <label class="form-check-label d-inline-flex align-self-center" for="directFlights">Direct
                                flights</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-left col-auto">
                        <button type="submit" class="btn btn-primary">Search flights</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <footer>
    <div class="footer-container">
        <!-- Left Column: Links -->
        <div class="footer-column">
            <h3>Important Links</h3>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Cookies Policy</a></li>
                <li><a href="#">Terms & Condition</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <!-- Center Column: Social Media Icons -->
        <div class="footer-column social-media">
            <div id="newsletter" class="container mt-5 mb-5">
            <h2>Subscribe to our Newsletter</h2>
                <form action="includes/subscribe.inc.php" method="POST">
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com/greyhawktravelandtours"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="https://youtube.com/@greyhawktravelandtours?si=Ysg5Yx-V5aPeawcJ"><i class="fab fa-youtube"></i></a>
        </div>

        <!-- Right Column: Contact Info -->
        <div class="footer-column">
            <h3>Contact Info</h3>
            <p>Greyhawk Travel and Tours</p>
            <p>Email: info@greyhawktravel.com</p>
            <p>Phone: +63 9705902154</p>
            <p>Address: Godofredo Reyes Sr., Ragay, Camarines Sur</p>
        </div>
    </div>
</footer>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Greyhawk Travel and Tours | All rights reserved.</p>
</footer>

<script>
    document.getElementById("flight-form").addEventListener("submit", async function (e) {
        e.preventDefault();
        
        const origin = document.getElementById("origin").value;
        const destination = document.getElementById("depart").value;
        const departureDate = document.getElementById("departure-date").value;
        const returnDate = document.getElementById("return-date").value || undefined;
        const adults = document.getElementById("adults").value;
        const children = document.getElementById("children").value;
        const infants = document.getElementById("infants").value;
        const travelClass = document.getElementById("cabin").value;
        const directFlights = document.getElementById("directFlights").checked;
        
        // Authorization (you might already have a token saved for your session)
        const token = await getAuthToken();

        // Constructing the query
        let query = `https://api.amadeus.com/v2/shopping/flight-offers?originLocationCode=${origin}&destinationLocationCode=${destination}&departureDate=${departureDate}&adults=${adults}&travelClass=${travelClass}`;
        
        if (returnDate) query += `&returnDate=${returnDate}`;
        if (children > 0) query += `&children=${children}`;
        if (infants > 0) query += `&infants=${infants}`;
        if (directFlights) query += `&nonStop=true`;

        try {
            const response = await fetch(query, {
                headers: {
                    Authorization: `Bearer ${token}`
                }
            });
            
            if (response.ok) {
                const data = await response.json();
                displayResults(data);
            } else {
                alert("Error: " + response.status + " - " + response.statusText);
            }
        } catch (error) {
            console.error("Error:", error);
        }
    });

    // Function to get an auth token from Amadeus
    async function getAuthToken() {
        const authResponse = await fetch("https://api.amadeus.com/v1/security/oauth2/token", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `grant_type=client_credentials&client_id=rb0D0wW8YnLbc64TknQGbsu8Y8vgj04D&client_secret=AVbRkRKkAWGowDf6`
        });

        const authData = await authResponse.json();
        return authData.access_token;
    }

    // Function to display the results
    function displayResults(data) {
        const resultsContainer = document.createElement("div");
        resultsContainer.className = "results";
        resultsContainer.innerHTML = "<h3>Flight Search Results</h3>";
        
        data.data.forEach(offer => {
            const offerElement = document.createElement("div");
            offerElement.className = "offer";
            
            const segments = offer.itineraries.map(itinerary => {
                return itinerary.segments.map(segment => `
                    <p><strong>Flight:</strong> ${segment.carrierCode} ${segment.number}</p>
                    <p><strong>From:</strong> ${segment.departure.iataCode} at ${segment.departure.at}</p>
                    <p><strong>To:</strong> ${segment.arrival.iataCode} at ${segment.arrival.at}</p>
                `).join("");
            }).join("<hr>");

            offerElement.innerHTML = `
                <div><strong>Price:</strong> ${offer.price.total} ${offer.price.currency}</div>
                ${segments}
                <hr>
            `;
            resultsContainer.appendChild(offerElement);
        });
        
        document.body.appendChild(resultsContainer);
    }
</script>


</body>
</html>