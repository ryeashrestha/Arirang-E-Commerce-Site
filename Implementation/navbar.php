<body>
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar .navbar-brand {
            font-family: 'Pacifico', cursive;
            color: #73c6b6 !important;
            font-size: 2rem !important;
            margin-left: 50px;
        }

        .navbar .nav-link {
            font-size: 1.2rem;
            color: #000 !important;
        }

        .navbar .nav-link:hover {
          color: #73c6b6 !important;
        }   
        .logout-button {
            text-align: center;
            padding: 15%;
        }
        .logout-button p {
            font-size: 50px;
            font-weight: bold;
        }
    </style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="homepage.php">arirang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav ms-auto justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="closed_event.php">Closed Event</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="review.php">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout_action.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
