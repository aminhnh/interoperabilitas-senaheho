<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    #sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    #sidebar ul li a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
    }
    #sidebar ul li a:hover {
        background-color: #8B0000;
    }
    #sidebar.minimized {
        width: 0; /* Lebar menjadi 0 ketika diminimalkan */
        overflow: hidden;

    }
    #content {
        transition: margin-left 0.5s; /* Animasi perubahan margin */    
    }
</style>
<body>
    <nav class="navbar navbar-light fixed-top d-flex space-between bg-red"  style="background-color: #8B0000;" >
        <button class="btn" id="sidebarToggle">
        <img width="20rem" src="{{ asset('assets/Menu.svg') }}">
        </button>
        <a class="navbar-brand d-flex flex-row align-items-center gap-2 " href="#">
        <div class="d-flex flex-row align-items-center mx-3" >
            <svg width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="15" cy="15" r="15" fill="#D9D9D9"/>
            </svg>
                <a class="text-white" href="">User</a>
            </a>
        </div>
    </nav>
    <div class="list-group"  id="sidebar" style="width: 200px; height: 100vh; background-color: #8B0000; position: fixed; padding-top: 5rem;">
        <ul>
            <li><a class="text-white" href="/dashboard">Dashboard</a></li>
            <li><a class="text-white" href="/blood-stock">Persediaan Darah</a></li>
            <li><a class="text-white" href="/lembaga">Lembaga</a></li>
            <li><a class="text-white" href="/wilayah">Wilayah</a></li>
            <li><a class="text-white" href="/settings">Settings</a></li>
            <li><a class="text-white" href="/profile">Profile</a></li>
            <li><a class="text-white" href="/logout">Logout</a></li>
        </ul>
    </div>
    <div id="content" style="margin-left: 200px;">
        <!-- Konten utama aplikasi Anda di sini -->
        @yield('content')
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('minimized');
            if (sidebar.classList.contains('minimized')) {
                content.style.marginLeft = '0px'; 
                sidebar.style.width = '0px'
                sidebar.style.overflow = 'hidden'
            } else {
                content.style.marginLeft = '250px';
                sidebar.style.width = '250px'
                sidebar.style.overflow = 'hidden' 
            }
        }); 
    });
</script>
</html>
