<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-comm Project</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

<!-- Optional theme -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}

</body>
<style>
    .trending-image{
        max-width: 60%;
    }
    .custom-height{
        height: 300px
    }
    .detail-img{
        max-width:100%;
        height: 100% !important;
    }
    .tp_buttons{
        display: flex;
        gap: 10px;
    }
    .custom-login{
        height: 500px;
        padding-top: 100px;
    }
    img.slider-img{
        height: 400px !important
    }
    .tp_heading{
        padding-left: 20px;
    }
    .pr{
        padding: 80px 0;
    }
    .custom-product{
        height: 600px
    }
    .slider-text{
        background-color: #35443585 !important;
    }
    .card {
    margin-bottom: 30px;
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.pagination {
    margin-top: 20px;
}
    .detail-img{
        height: 200px;
    }
    .search-box{
        width: 500px !important
    }
    .cart-list-devider{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }
    .back-to-top-row {
    display: block;
    text-decoration: none;
    background-color: #35443585;
    color: white;
  }

  .back-to-top-row:hover {
    background-color: #4a5a4f;
  }

  .back-to-top-row .row {
    padding: 10px 0;
  }

  .back-to-top-row h5 {
    margin-bottom: 0;
  }
  .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .pagination-link {
        display: inline-block;
        padding: 8px 12px;
        margin: 0 5px;
        background-color: #eaeaea;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s ease;
    }

    .pagination .pagination-link:hover {
        background-color: #ccc;
    }

    .pagination .pagination-link.active {
        background-color: #333;
        color: #fff;
    }
</style>
</html>