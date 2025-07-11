<?php
require_once __DIR__ . "/common/header_start.php";
require_once __DIR__ . "/common/header_end.php";
?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/nachalo.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Моят доктор</h1>
                            <span class="text bily">Запознайте се с местните ни лекари и си изберете подходящия за вас!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.php">
                            <h2 class="post-title">За какво служи сайтът?</h2>
                        </a>
                        <p class="post-meta">
                            
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="about.php"><h2 class="post-title">Изберете Вашия личен лекар тук</h2></a>
                        <p class="post-meta">
                        </p>
                    </div>
                    
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="contact.php">
                            <h2 class="post-title">За въпроси и контакт с нас</h2>
                        </p>
                    </div>
                   
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
         <script>
        $(document).ready(function() {
            // Load existing contacts when page loads
            loadContacts();
            
            // Form submission
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    message: $('#message').val()
                };
                
                // Disable submit button and show loading
                $('#submit-btn').prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>Sending...');
                $('#response-message').hide();
                
                // Make AJAX request
                $.ajax({
                    url: 'submit.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.message, 'success');
                            // Clear form on success
                            $('#contact-form')[0].reset();
                            // Reload contacts to show the new one
                            loadContacts();
                        } else {
                            showMessage(response.message, 'danger');
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = 'An error occurred while submitting the form.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showMessage(errorMessage, 'danger');
                    },
                    complete: function() {
                        // Re-enable submit button
                        $('#submit-btn').prop('disabled', false).html('<i class="bi bi-send me-2"></i>Send Message');
                    }
                });
            });
            
            function showMessage(message, type) {
                var $responseDiv = $('#response-message');
                $responseDiv.removeClass().addClass('alert alert-' + type);
                $responseDiv.html('<i class="bi bi-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-2"></i>' + message).show();
                
                // Auto-hide success messages after 5 seconds
                if (type === 'success') {
                    setTimeout(function() {
                        $responseDiv.fadeOut();
                    }, 5000);
                }
            }
            
            function loadContacts() {
                $.ajax({
                    url: 'submit.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success && response.data) {
                            displayContacts(response.data);
                        } else {
                            showNoContacts();
                        }
                    },
                    error: function() {
                        showNoContacts();
                    }
                });
            }
            
            function displayContacts(contacts) {
                var $container = $('#contacts-container');
                
                if (contacts.length === 0) {
                    showNoContacts();
                    return;
                }
                
                var html = '';
                contacts.forEach(function(contact) {
                    var date = new Date(contact.created_at || Date.now()).toLocaleDateString();
                    html += `
                        <div class="contact-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="contact-name">${escapeHtml(contact.name)}</div>
                                    <div class="contact-email">
                                        <i class="bi bi-envelope me-1"></i>${escapeHtml(contact.email)}
                                    </div>
                                    <div class="contact-message">${escapeHtml(contact.message)}</div>
                                    <div class="contact-date">
                                        <i class="bi bi-calendar me-1"></i>${date}
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <span class="badge bg-primary">#${contact.id}</span>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                $container.html(html);
            }
            
            function showNoContacts() {
                $('#contacts-container').html(`
                    <div class="no-contacts">
                        <i class="bi bi-inbox display-1 text-light opacity-50"></i>
                        <h4 class="text-light mt-3">No messages yet</h4>
                        <p class="text-light opacity-75">Be the first to send us a message!</p>
                    </div>
                `);
            }
            
            function escapeHtml(text) {
                var map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };
                return text.replace(/[&<>"']/g, function(m) { return map[m]; });
            }
        });
    </script>

    </body>
</html>
 <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
   