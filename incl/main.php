<?php if ( !defined('MITH') ) {exit;} ?>

        <section class="slider">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        <!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->
                        <li data-transition="slideleft" data-slotamount="7" data-masterspeed="700">
                            <img src="slider/bg_03.jpg">
                            <!-- <div class="caption skewfromright white s3" data-x="400" data-y="300" data-speed="700" data-start="1500" data-easing="easeOutBack">
                                <h2>Best cases for iPhone ever made!</h2>
                            </div>
                            <div class="caption skewfromright white s2" data-x="440" data-y="340" data-speed="700" data-start="2200" data-easing="easeOutBack">
                                <h2>Uniqe style and design.</h2>
                            </div>
                            <div class="caption lfr white underline s1" data-x="420" data-y="420" data-speed="1000" data-start="3000">
                                <h2> 20% off! </h2>
                            </div>
                            <div class="caption sfl" data-x="0" data-y="220" data-speed="1000" data-start="3000">
                                <img src="slider/01.png" alt="" class="">
                            </div> -->
                        </li>
                        <li data-transition="slideleft" data-slotamount="7" data-masterspeed="700"  >
                            <img src="slider/bg_02.jpg">
                        </li>
                        <li data-transition="slideleft" data-slotamount="7" data-masterspeed="700"  >
                            <img src="slider/bg_01.jpg">
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="slogan container">
            <h1><?php echo $tb; echo common_txt($tb, "main_slogan"); ?></h1>
        </div>

        <section class="lateNews container">
            <div class="headline"><h2><?php echo common_txt($tb, "main_news"); ?></h2></div>

            <?php 

            $news = news($tb, "3");
            foreach ($news as $value){
                echo '
            <div class="col-sm-4">
                <img class="img-responsive" src="'.$site.'img/news/'.$value["img"].'" alt="">
                <p>
                    '.$value[$tb].'
                </p>
                <a  href="news/'.$value["link_item"].'">'.common_txt($tb, "main_readm").' <i class="fa fa-arrow-circle-right"></i></a>
            </div>
                ';
            }

            ?>

        </section>

        <section class="container">
            <div class="headline"><h2>TOP Cases</h2></div>

                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice priceDiscount">
                                <div class="casePrice-old">399</div>
                                <div class="casePrice-final">319 <span class="priceCur">uah</span></div>
                                <div class="casePrice-disc">-20%</div>    
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_8_1.jpg" alt="">
                        <h3>Freedom</h3>
                    </a>
                </div>
                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice">
                                <div class="casePrice-final">399 <span class="priceCur">uah</span></div>  
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_16_1.jpg" alt="">
                        <h3>Polubotok</h3>
                    </a>
                </div>
                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice priceDiscount">
                                <div class="casePrice-old">399</div>
                                <div class="casePrice-final">319 <span class="priceCur">uah</span></div>
                                <div class="casePrice-disc">-20%</div>    
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_17_1.jpg" alt="">
                        <h3>Hetmanska</h3>
                    </a>
                </div>
                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice">
                                <div class="casePrice-final">399 <span class="priceCur">uah</span></div>  
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_10_1.jpg" alt="">
                        <h3>Rainbow</h3>
                    </a>
                </div>

        </section>

        <section class="container">
            <div class="headline"><h2>NEW Cases</h2></div>

                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice">
                                <div class="casePrice-final">399 <span class="priceCur">uah</span></div>  
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_4_1.jpg" alt="">
                        <h3>Полтавка</h3>
                    </a>
                </div>
                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice priceDiscount">
                                <div class="casePrice-old">399</div>
                                <div class="casePrice-final">319 <span class="priceCur">uah</span></div>
                                <div class="casePrice-disc">-20%</div>    
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_6_1.jpg" alt="">
                        <h3>Гармонія</h3>
                    </a>
                </div>
                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice">
                                <div class="casePrice-final">399 <span class="priceCur">uah</span></div>  
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_7_1.jpg" alt="">
                        <h3>Геометрія</h3>
                    </a>
                </div>
                <div class="col-sm-3 caseBl">
                    <a href="">
                        <span class="casePriceWrap">
                            <div class="casePrice">
                                <div class="casePrice-final">399 <span class="priceCur">uah</span></div>  
                            </div>
                        </span>
                        <img class="picIndex" src="img/cases_iPhone_5/5_14_1.jpg" alt="">
                        <h3>Сонце</h3>
                    </a>
                </div>

        </section>