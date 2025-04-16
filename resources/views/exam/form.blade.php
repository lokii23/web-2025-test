
<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <!-- Bootstrap Icons-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
            <!-- Google fonts-->
            <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
            <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
            <!-- SimpleLightbox plugin CSS-->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
            <!-- Core theme CSS (includes Bootstrap)-->
            <link href="../../../landing-page/css/styles.css" rel="stylesheet" />

            <style>
                .place::placeholder {
                  color: #ff7300;
                }
                .please{
                    color: #ffffff;
                    margin-top: -100px;
                    font-style: italic;
                }
                span{
                    font-weight: bold;
                    color: #ff7300;
                }
            </style>                
        </head>
        <body id="page-top">
            <header class="masthead">
                <div class="container px-4 px-lg-5 h-100">
                    <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                        <form method="POST" action="{{ $actionRoute }}">
                            @csrf
                            <h1 class="please">Enter <span>Secret Key</span> for <span>{{ ucfirst($subject) }}</span></h1>
                            <input class="place" style="color: #ff7300; padding: 20px;" type="password" name="password" placeholder="Enter password">
                            <button class="btn btn-outline-primary" style="color: white; padding: 20px;" type="submit">OK</button>
                            @error('password')
                                <div style="color: red">{{ $message }}</div>
                            @enderror
                            <br/>
                            <br/>
                            <br/>
                            <a href="/exam/courses" class="btn btn-primary">Choose another subject</a>
                        </form>
                    </div>
                </div>
            </header>
            <!-- Footer-->
            <footer class="py-5">
                <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2025 - Jinewick Hernal</div></div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- SimpleLightbox plugin JS-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
            <!-- Core theme JS-->
            <script src="../../../landing-page/js/scripts.js"></script>
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <!-- * *                               SB Forms JS                               * *-->
            <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
            <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        </body>
    </html>
    
</x-app-layout>