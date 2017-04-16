<div class="page-subheader text-center">
                        <h1>Sign in</h1>
                        <hr/>
                        <p>Silahkan sign untuk memasuki client area</p>
                    </div>

                    <form action="#" method="post">

                        <div class="form-group">
                            <div class="controls">
                                <input type="text" placeholder="Username" class="form-control input"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <input type="password" placeholder="Password" class="form-control input"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="controls">
                                <div class="checkbox">
                                    <input name="checkbox" id="checkbox1" value="checkbox1" checked="" type="checkbox">
                                    <label for="checkbox1">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <button class="btn btn-primary">Login</button>
                            <a href="<?php echo site_url('client_area/register')?>" class="btn btn-primary pull-right">Register</a>

                        </div>


                    </form>
