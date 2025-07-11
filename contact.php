<?php
require_once __DIR__ . "/common/header_start.php";
require_once __DIR__ . "/common/header_end.php";
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/contact.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Свържете се с нас</h1>
                            <span class="subheading">При възникнали въпроси винаги се чувствайте свободни, да се свържете с нас!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
      
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Тук може да попълните даните си и да изпратите въпросите си. Обещаваме бърза обратна връзка!</p>
                        <div class="my-5">
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form id="contactForm" action="submit.php" method="POST">
                                <div class="form-floating">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Име</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Изисква се име</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                    <label for="email">Вашият имейл</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Изисква се имейл</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Невалиден имейл</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                                    <label for="phone">Телефонен номер</label>
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">Изисква се телефонен номер</div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                                    <label for="message">Вашето съобщение</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">Изисква се съобщение</div>
                                </div>
                                <br />
                                <!-- Submit success message-->
                                <button class="btn btn-primary text-uppercase" id="" type="submit">Изпратете</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                      
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
