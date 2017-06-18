
                    <!-- Sidebar / START -->
                    <div class="col-xs-12 col-md-4 col-lg-3 sidebar">

                        <!-- <div class="block bg-gray quick-search">

                            <form method="post">

                                <div class="form-group">
                                    <div class="controls">
                                        <input placeholder="Search word" type="text" class="form-control input"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <select class="form-control select" name="nothing">
                                            <option disabled selected value="0">Color</option>
                                            <option value="1">Value 1</option>
                                            <option value="2">Value 2</option>
                                            <option value="3">Value 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input placeholder="From" type="text" class="form-control input"/>
                                            </div>
                                            <div class="col-xs-6">
                                                <input placeholder="To" type="text" class="form-control input"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <input name="checkbox" id="checkbox1" value="checkbox1" checked="" type="checkbox">
                                        <label for="checkbox1">
                                            Option one
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <select class="form-control select" name="nothing">
                                            <option disabled selected value="0">Type</option>
                                            <option value="1">Value 1</option>
                                            <option value="2">Value 2</option>
                                            <option value="3">Value 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="radio">
                                                    <input name="optionsRadios" id="optionsRadios1" value="option1" type="radio">
                                                    <label for="optionsRadios1">
                                                        Automatic
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="radio">
                                                    <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                                                    <label for="optionsRadios2">
                                                        Manual
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Search</button>
                                </div>

                            </form>

                        </div> -->

                        <section id="side-categories">
                            <div class="page-subheader">
                                <h1>KATEGORI PRODUK</h1>
                                <hr/>
                            </div>

                            <div class="block navigation navigation-circle-empty">
                                <ul>
                                    <?php foreach ($this->scm_library->kategori() as $k): ?>
                                      <li><a href="#"><?php echo $k->nama_kategori ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </section>

                    </div><!-- Sidebar / END -->
