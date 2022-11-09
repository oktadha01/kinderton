<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }

    .b-radius-5px {
        border-radius: 5px;
    }
</style>
<div class="modal fade top-4rem" id="modal-login">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-b-p-2px">
                <h4 class="modal-title">LOGIN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-3">
                    </div>
                    <div class="col-lg-9 col-md-9 col-9">
                        <!-- <h6 class="modal-title float-right">Belum Punya Akun? <a href="<?php echo base_url('register'); ?>">Daftar <i class="fa-solid fa-arrow-right"></i></a></h6> -->
                    </div>
                </div>
                <section class="">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-9 col-lg-6 col-xl-5">
                                <img src="<?php echo base_url('assets'); ?>/img/parallax.jpg" class="img-fluid mt-2 mb-2 b-radius-5px" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form action="<?php echo site_url('login'); ?>" method="POST">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gmail">Email address</label>
                                        <input type="email" id="gmail" class="form-control form-control-lg" name="gmail" placeholder="Enter a valid email address" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Enter password" />
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="showpass" />
                                            <label class="form-check-label" for="showpass">
                                                Show Password
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button class="btn btn-primary btn-lg" type="submit" class="login-button" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="<?php echo base_url('register'); ?>" class="link-danger">Register</a></p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
    $('#showpass').click(function(e) {
        const input = document.querySelector("#password");
        input.getAttribute("type") === "password" ?
            input.setAttribute("type", "text") :
            input.setAttribute("type", "password");
    });
</script>