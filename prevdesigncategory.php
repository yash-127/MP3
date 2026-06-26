<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
/* Custom styles */
body {
    min-height: 100vh;
    margin: 0;
    overflow-x: hidden;
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 250px;
    z-index: 1000;
    background-color: #000;
    transition: width 0.3s ease-in-out;
}

.sidebar-heading {
    font-size: 1.2rem;
    color: #fff;
    padding: 1rem;
    white-space: nowrap;
    overflow: hidden;
}

.sidebar .nav-link {
    padding: 0.8rem 1rem;
    color: rgba(255, 255, 255, 0.8);
    transition: all 0.3s;
    white-space: nowrap;
    overflow: hidden;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.sidebar .nav-link:hover {
    color: #fff;
    background-color: rgba(255, 255, 255, 0.1);
}

.sidebar .nav-link i {
    width: 24px;
    text-align: center;
    font-size: 1.2rem;
}

.sidebar .nav-link span {
    transition: opacity 0.3s ease-in-out;
    opacity: 1;
}

.sidebar-section {
    margin-bottom: 0.5rem;
}

.sidebar-section h6 {
    white-space: nowrap;
    overflow: hidden;
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}

/* Section Dividers */
.section-divider {
    height: 1px;
    background-color: rgba(255, 255, 255, 0.1);
    margin: 0.5rem 1rem;
}

/* Navbar */
.navbar {
    
    position: fixed;
    top: 0;
    right: 0;
    left: 250px;
    height: 60px;
    padding: 0.5rem 1.5rem;
    background: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    z-index: 1020;
    transition: left 0.3s ease-in-out;
}

/* Search Form Styles */
.search-form {
    margin-left: 1rem;
    position: relative;
}

.search-form .form-control {
    width: 400px;
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    padding-left: 2.5rem;
    padding-right: 1rem;
    height: 38px;
}

.search-form .form-control:focus {
    background-color: #fff;
    box-shadow: none;
    border-color: #dee2e6;
}

.search-icon {
    position: absolute;
    left: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    pointer-events: none;
}

/* Main Content */
.main-content {
    margin-left: 250px;
    margin-top: 60px;
    padding: 1.5rem;
    min-height: calc(100vh - 60px);
    background-color: #f8f9fa;
    transition: margin-left 0.3s ease-in-out;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: #212529;
}

.content-row {
    margin-bottom: 2rem;
}

.music-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.05);
}

.music-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.music-card .card-img-top {
    aspect-ratio: 1;
    object-fit: cover;
    background-color: #e9ecef;
}

.music-card .card-body {
    padding: 1rem;
}

.music-card .card-title {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.music-card .card-text {
    font-size: 0.875rem;
    color: #6c757d;
}

.featured-card {
    height: 200px;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
    margin-bottom: 1.5rem;
}

.featured-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.featured-card .featured-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: white;
}

.featured-card .featured-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.featured-card .featured-text {
    font-size: 0.875rem;
    opacity: 0.9;
}

.section-divider-content {
    height: 1px;
    background-color: rgba(0,0,0,0.1);
    margin: 2rem 0;
}

/* Songs List Styles */
.songs-section {
    background: #fff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.song-item {
    display: flex;
    align-items: center;
    padding: 0.75rem;
    border-radius: 6px;
    transition: all 0.2s;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.song-item:hover {
    background-color: #f8f9fa;
}

.song-item:last-child {
    border-bottom: none;
}

.song-number {
    width: 30px;
    color: #6c757d;
    font-size: 0.9rem;
}

.song-cover {
    width: 40px;
    height: 40px;
    border-radius: 4px;
    margin-right: 1rem;
    object-fit: cover;
}

.song-info {
    flex: 1;
    min-width: 0;
}

.song-title {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 500;
    color: #212529;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-artist {
    margin: 0;
    font-size: 0.85rem;
    color: #6c757d;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-duration {
    color: #6c757d;
    font-size: 0.85rem;
    margin-left: 1rem;
}

.song-actions {
    display: none;
    margin-left: 1rem;
}

.song-item:hover .song-actions {
    display: flex;
    gap: 0.5rem;
}

.song-item:hover .song-duration {
    display: none;
}

.action-btn {
    background: none;
    border: none;
    padding: 0.25rem;
    color: #6c757d;
    cursor: pointer;
    transition: color 0.2s;
}

.action-btn:hover {
    color: #212529;
}

.song-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.05);
}

.song-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.song-card-img {
    position: relative;
    width: 100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    overflow: hidden;
}

.song-card-img img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.song-card-img .play-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.2s;
}

.song-card:hover .play-overlay {
    opacity: 1;
}

.play-btn {
    width: 35px;
    height: 35px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    transition: transform 0.2s;
}

.play-btn:hover {
    transform: scale(1.1);
}

.play-btn i {
    font-size: 1.1rem;
    color: #212529;
    margin-left: 2px;
}

.song-card-content {
    padding: 0.75rem;
}

.song-card-title {
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: #212529;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-card-artist {
    font-size: 0.8rem;
    color: #6c757d;
    margin-bottom: 0.25rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.song-card-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #6c757d;
    font-size: 0.75rem;
}

.song-card-actions {
    display: flex;
    gap: 0.25rem;
}

@media (max-width: 1200px) {
    .col-xl-2 {
        flex: 0 0 auto;
        width: 33.333333%;
    }
}

@media (max-width: 768px) {
    .navbar {
        left: 60px;
    }
    
    .main-content {
        margin-left: 60px;
    }
    
    .song-card {
        margin-bottom: 1rem;
    }
    
    .play-btn {
        width: 30px;
        height: 30px;
    }
    
    .play-btn i {
        font-size: 1rem;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .sidebar {
        width: 60px;
    }
    .boom{
        margin-left:50px;
    }
    .footer{
        margin-left:0;
    }
    .sidebar .nav-link {
        padding: 0.8rem 1rem;
        text-align: center;
    }
    
    .sidebar .nav-link i {
        margin: 0;
        font-size: 1.4rem;
    }
    
    .sidebar .nav-link span,
    .sidebar .sidebar-heading h4,
    .sidebar .sidebar-section h6 {
        opacity: 0;
        width: 0;
        display: none;
    }
    
    .section-divider {
        margin: 0.5rem 0.5rem;
    }
    
    .navbar {
        left: 60px;
    }
    
    
   
    
    .main-content {
        margin-left: 60px;
    }
    
    .music-card {
        margin-bottom: 1rem;
    }
    
    .featured-card {
        height: 150px;
    }
    
    .songs-section {
        padding: 1rem;
    }
    
    .song-item {
        padding: 0.5rem;
    }
    
    .song-cover {
        width: 35px;
        height: 35px;
    }
    
    .song-title {
        font-size: 0.9rem;
    }
    
    .song-artist {
        font-size: 0.8rem;
    }
    
    .song-card {
        margin-bottom: 1rem;
    }
    
    .play-btn {
        width: 40px;
        height: 40px;
    }
    
    .play-btn i {
        font-size: 1.2rem;
    }
}
@media (max-width: 970px) {
    
    .search-form .form-control {

        width: 200px;
    }
    .boom{
        margin-left:74px;
    }
   
}

@media (max-width: 1200px) {
    
    .doom{
        position:absolute;
        margin-left:-330px;
    }
}
@media (max-width: 1000px) {
    
  
    .doom{
        margin-left:-430px;
    }
}
@media (max-width: 900px) {
    
  
    .doom{
        margin-left:-500px;
    }
}
@media (max-width: 580px) {
    .doom{
        margin-left:-530px;
    }
    .none {

        display: none;
    }
}

/* Tooltip styles for icons */
.sidebar .nav-link {
    position: relative;
}

.sidebar .nav-link:hover::after {
    content: attr(data-title);
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 1002;
    display: none;
}

@media (max-width: 768px) {
    .sidebar .nav-link:hover::after {
        display: block;
    }
    .nah{
        margin-left:33px;
    }
}

#imageCarousel {
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
#imageCarousel .carousel-item img {
    height: 400px;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

#imageCarousel .carousel-item:hover img {
    transform: scale(1.1);
}

/* Make sure the zoom effect doesn't overflow */
#imageCarousel .carousel-item {
    overflow: hidden;
}

/* Ensure controls stay on top of zoomed image */
#imageCarousel .carousel-control-prev,
#imageCarousel .carousel-control-next {
    z-index: 5;
}

/* Ensure indicators stay on top of zoomed image */
#imageCarousel .carousel-indicators {
    z-index: 5;
}

.songs-list {
    margin-top: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    height: 400px;  
    display: flex;
    flex-direction: column;
}

.songs-list h3 {
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #f1f1f1;
}

.list-group-item {
    border-left: none;
    border-right: none;
    padding: 15px;
    transition: all 0.3s ease;
    height: 60px;  
    display: flex;
    align-items: center;
}

.list-group-item:first-child {
    border-top: none;
}

.list-group-item:last-child {
    border-bottom: none;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}

.list-group-item i {
    font-size: 1.2rem;
    color: #6c757d;
}

.list-group-item h5 {
    margin-bottom: 0.2rem;
    font-size: 1rem;
}

.list-group-item small {
    font-size: 0.85rem;
}

.songs-list .list-group {
    overflow-y: auto;
    flex-grow: 1;
    scrollbar-width: thin;
    padding-right: 5px;
}

/* Custom scrollbar styles */
.songs-list .list-group::-webkit-scrollbar {
    width: 6px;
}

.songs-list .list-group::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.songs-list .list-group::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

.songs-list .list-group::-webkit-scrollbar-thumb:hover {
    background: #555;
}




/* Footer Styles */
.footer {
    margin-left: 250px;
   
    padding: 1.5rem;
    transition: margin-left 0.3s ease-in-out;

    background-color: #1b1b1b !important;
    position: relative;
    margin-top: auto;
}
@media (max-width: 768px) {
    
  
    .footer{
        margin-left:0px;
    }
}

.footer-heading {
    color: #fff;
    font-weight: 600;
    position: relative;
    padding-bottom: 10px;
}

.footer-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #007bff;
}

.footer-links a {
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #007bff !important;
}

.social-links a {
    font-size: 1.25rem;
    transition: transform 0.3s ease, color 0.3s ease;
}

.social-links a:hover {
    color: #007bff !important;
    transform: translateY(-3px);
}

.subscribe-form .form-control {
    background-color: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.subscribe-form .form-control:focus {
    box-shadow: none;
    border-color: #007bff;
}

.subscribe-form .btn-primary {
    background-color: #007bff;
    border: none;
    padding: 8px 20px;
}

.subscribe-form .btn-primary:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

/* Page Enhancement */
.card {
    border: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
}

.btn {
    border-radius: 50px;
    padding: 0.5rem 1.5rem;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease forwards;
}


</style>
<style>
    .bi bi-three-dots{
        transform: rotate(45deg);
    }
    p {
  display: inline;
  margin: 20px;
  color:black;
  font-family: "Times New Roman", Times, serif;
  transition: transform 0.2s, font-size 0.2s;
  
}
.one{
    display: inline;
   font-size:15px;
    margin-left:20px;
  
  color:black;
  text-transform: uppercase;
  font-family: "Times New Roman", Times, serif;
}
a { text-decoration: none; }
.pu{
    display: flex;
   margin-top:25px;
    
}
.cat{
    height:250px; width:250px;
   
}

p:hover {
   font-size:19px;
    animation: rise 1s ease-in-out;
}
.pop{
    transition: margin-left 0.3s ease-in-out;
}
@media (max-width: 1350px) {
    
  
    .pop{
        position: absolute;
        margin-left:-60px;
    }
}
@media (max-width: 1160px) {
    
  
    .pop{
        position: absolute;
        margin-left:-110px;
    }
}
@media (max-width: 970px) {
    
  
    .pop{
    display:none;
    }
}
@media (max-width: 765px) {
    
  
    .pop{
        display:block;
        margin-left:120px;
        margin-top: -27px;
    }
}
@media (max-width: 800px) {
    
  
   .one{
    font-size:13px;
   }
}
@media (max-width: 765px) {
    
  
    .one{
     font-size:15px;
    }
 }
@media (max-width: 668px) {
   
  
    .pop{
        display:block;
        margin-left:20px;
        margin-top: -27px;
    }
}


</style>
<body>
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white">
        <div class="sidebar-heading">
            <h4 class="mb-0">YMUSIC</h4>
        </div>
        
        <!-- Main Navigation -->
        <div class="sidebar-section">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php" data-title="Discover">
                        <i class="bi bi-compass me-2"></i>
                        <span>Discover</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="browse.php" data-title="Browse">
                        <i class="bi bi-collection me-2"></i>
                        <span>Browse</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- My Collection Section -->
        <div class="sidebar-section mt-4">
            <h6 class="sidebar-heading px-3 mt-4 mb-1  small">My Collection</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-title="Likes">
                        <i class="bi bi-heart me-2"></i>
                        <span>Likes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-title="Album">
                        <i class="bi bi-images me-2"></i>
                        <span>Album</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-title="Playlist">
                        <i class="bi bi-music-note-list me-2"></i>
                        <span>Playlist</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- My Stuff Section -->
        <div class="sidebar-section mt-4">
            <h6 class="sidebar-heading px-3 mt-4 mb-1  small">Other</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-title="Settings">
                        <i class="bi bi-gear me-2"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="d-flex w-100 align-items-center">
                <form class="d-flex me-auto search-form">
                    <i class="bi bi-search search-icon"></i>
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
                <div class="none">
                    <button class="btn btn-outline-dark me-2">Login</button>
                    <button class="btn btn-dark">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-content">
    <div class="container-fluid">
        <div class="row content-row">
       
            
        
            <div class="row">
            <?php

$conn = mysqli_connect("127.0.0.1","root","","mp3");

$rs = mysqli_query($conn,"select * from category order by RAND()");

while($r=mysqli_fetch_array($rs)){
   $code=$r["code"];
   ?>
           
            <div class=" col-md-4 pu">
            <div class="card" style="width:500px; height:44px;">
               <div style="margin-top:10px;">
               <a href="albcat.php?id=<?=$r["code"]?>&&pi=<?=$r["category"]?>"> <div class="one"><?=$r["category"]?></div></a>
                       <div class="song-card-actions pop">
                         
                 
                                                    
                                    <button class="action-btn " style="margin-top: -27px;margin-left: 250px;" ><i class="bi bi-heart"></i></button>
                                    <button class="action-btn " style="margin-top: -27px;"><i class="bi bi-three-dots-vertical"></i></button>
                                    </div>

                       </div>
           </div>
                      
                    </div>
                    
             
                   <?php
  
            }
     
     ?>
       
       </div>
       </div>
        </div>
        </div>
        






 <!-- Footer -->
  <div class="nah">
    <footer class="footer bg-grey text-white py-5">
        <div class="container">
            <div class="row">
                <!-- About Us Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">About Us</h5>
                    <p class="text-white-50">We are a modern music platform dedicated to bringing you the best music experience. Discover, stream, and share your favorite music with friends and family.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Services</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>

                <!-- Subscribe Column -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading mb-3">Subscribe Us</h5>
                    <p class="text-white-50">Subscribe to our newsletter for updates and exclusive offers!</p>
                    <div class="subscribe-form">
                        <form class="mt-3">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control bg-dark text-white border-secondary" 
                                       placeholder="Enter your email" aria-label="Enter your email">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr class="border-secondary mt-4">
            
            <!-- Copyright Section -->
            <div class="row mt-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">&copy; 2025 Music Dashboard. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                    <a href="#" class="text-white text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
 

    </div>
  
       

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
