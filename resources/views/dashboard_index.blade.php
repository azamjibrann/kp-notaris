 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="">
    <style>
        *{
    padding: 0;
    margin: 0;
    }

    .container{
        display: flex;
        min-height: 100vh;
    }

    .sidebar{
        background: #02245efe;
        width: 260px;
        padding: 24px;
        display: flex;
        box-sizing: border-box;
        float: left;
        flex-direction: column;
    }

    .sidebar a{
        text-decoration: none;
    }

    /* .header{
        background-color: red;
    } */

    .header .deskripsi-header{
        color: white;
        font-size: 18px;
        font-weight: 900;
        text-align: center;
        line-height: 20px;
        margin-left: 10px;
        /* background: red; */
    }

    .list-item img{
        width: 35px;
        float: left;
        margin-top: -8px;

    }

    .icon{
        width: 20px;
        padding-right: 10px;
    }

    /* .list{
        margin: 23px 0px 10px 0px;
    } */

    .main{
        margin-top: 30px;

    }

    .main a{
        color: white;
        margin-left: 10px;
    }

    .main .dash{
        margin-bottom: 20px;
        color: white;
    }

    .main .list-dash{
        border: 1.5px solid white;
        border-radius: 20px;
        padding: 9px 50px 9px 10px;
        margin: 20px -10px 10px -10px;
        box-sizing: border-box;
    }

    .list-dash a {
        display: flex;
        align-items: center;
    }

    .list-dash:hover{
        background: rgb(91, 91, 91);
        color: rgb(255, 255, 255);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .logout-btn {
        padding: 8px 15px;
        background-color: #11088f;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s;
        cursor: pointer;
        }

        .logout-btn:hover {
        background-color: #f8f8fa;
        color: #11088f
        }
        .main-content {
        flex: 1;
        padding: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }
        .card{
            background: #eee;
            padding: 10px;
            text-align: center;
        }
        .photo {
            width: 100%; height: 150px;
            object-fit: cover;
        }
        .cn1 {
            margin-left: 100px;
            padding: 20px;
        }




    </style>
</head>
<body>
    <div class="container">

    <div class="sidebar">
        <div class="header">
            <div class="list-item">
                <a href="#">
                    <img src="img/documents.png" alt="">
                    <span class="deskripsi-header">NOTARIS/PPAT</span>
                </a>
            </div>
        </div>
        <div class="main">
            <h2 class="dash">Dashboard</h2>
            <div class="list-dash">
                <a href="index.php">
                    <img src="img/menu.png" alt="" class="icon">
                    <span class="menu">Menu</span>
                </a>
            </div>
            <div class="list-dash">
                <a href="">
                    <img src="img/jadwal.png" alt="" class="icon">
                    <span class="jadwal">Jadwal</span>
                </a>
            </div>
            <!-- <div class="list-menu">
                <a href="">
                    <img src="img/bunga.png" alt="" class="icon">
                    <span class="menu">Menu</span>
                </a>
            </div> -->

        </div>
    </div>
    <div class="main-konten">

                <div class="main-content">
                    <div class="header">
                    {{-- Form Logout (POST method) --}}
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>


                    </div>

                    <div class="cn1">
                    <div class="grid">
                        @foreach ($photos as $photo)
                            <div class="card">
                                <img src="{{ asset('storage/' . $photo->image) }}" class="photo" />
                                <p>{{ $photo->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

        </div>
    </div>

</body>
</html>
