<?php
/**
 * The main template file.
 *
 * Template Name: Homepage
 *
 * @package Fresh Theme
 */

get_header(); ?>

    <header id="header">
        <div class="magic">
	        <nav>
	            <div class="container">
	                <button class="toggle_menu_wheel">
	                    <a href="" id=""><img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt=""></a>
	                </button>
	                <a href="" id="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg" alt=""><span>Italo Express Courier</span></a>
                   <ul>
                        <li class="nav-item"><a href="#who">Chi e' Italo</a></li>
                        <li class="nav-item"><a href="#why">Perche' Italo</a></li>
                        <li class="nav-item"><a href="#contact">Contatti</a></li>
                    </ul>
	                <button class="toggle_menu">
	                    <div class="bars">
	                        <span></span>
	                        <span></span>
	                        <span></span>
	                    </div>
	                </button>
	            </div>
	        </nav>
            <div class="lightning"></div>
            <div class="stars-wrapper"></div>
            <span class="cloud cloud1"><i class="fa fa-cloud"></i></span>
            <span class="cloud cloud2"><i class="fa fa-cloud"></i></span>
            <span class="cloud cloud3"><i class="fa fa-cloud"></i></span>
	        <img src="<?php bloginfo('template_url'); ?>/img/truck.svg" alt="" id="truck">
            <div class="rain-wrapper"></div>

        </div>
    </header>

    <main>

        <section id="who">
            <div class="container">
                <div class="row">
                    <div class="col-m-12 withpadding">
                        <h2 class="title centered"><?php echo CFS()->get( 'who_title' ); ?></h2>
                        <!-- <h2 class="title centered">Chi e' Italo?</h2> -->
                            <?php the_content();?>
<!--                         <p class=""><b>Italo Express Courier</b> è un servizio regolare dedicato di trasporti su strada tra Amsterdam e l'Italia e tutte le destinazioni intermedie. Inoltre offriamo servizio trasloco da e per le principali localita' Europee. Tra i nostri clienti ci sono: importatori, ristoranti e tutti gli splendidi italiani globe-trotter che in questi anni sono diventati nostri clienti ed amici.</p> -->
                        <a href="#contact" class="button"><?php echo CFS()->get( 'who_button' ); ?></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="why">
            <div class="container">
                <div class="row">
                    <div class="col-m-12">
                        <h2 class="title centered"><?php echo CFS()->get( 'why' ); ?></h2>
                        <p class="centered"><?php echo CFS()->get( 'reason' ); ?></p>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $fields = CFS()->get( 'services' );
                        foreach ( $fields as $field ) {?>
                            <div class="col-m-4 thecontent">
                                <img src="<?php echo $field['service_image']; ?>" alt="" id="doortodoor">
                                <div class="description">
                                    <h2><?php echo $field['service_title']; ?></h2>
                                    <p class=""><?php echo $field['service_text']; ?></p>
                                </div>
                            </div>
                    <?php
                        }
                     ?>

<!--                     <div class="col-m-4 thecontent">
                        <img src="<?php bloginfo('template_url'); ?>/img/doortodoor.svg" alt="" id="doortodoor">
                        <div class="description">
                            <h2>Door to Door</h2>
                            <p class="">La nostra forza è la consegna Door to Door, senza passaggi intermedi. Per esempio: parti in aereo e non vuoi trascinarti dietro i bagagli, imbarcarli, recuperarli? <br/>Ci pensa Italo. Non fare come <a href="http://mammamsterdam.net/in-aereo-con-i-bambini-da-eindhoven/">Mammamsterdam</a> che si trascinava dietro neonati e bagagli. Ma è solo un esempio. Tu saprai sicuramente come posso semplificarti la vita.</p>
                        </div>
                    </div>
                    <div class="col-m-4 thecontent">
                        <img src="<?php bloginfo('template_url'); ?>/img/italo.svg" alt="" id="italo">
                        <div class="description">
                            <h2>Affidabilità</h2>
                            <p class="">Italo Summa, il proprietario adora viaggiare e quasi tutti i trasporti li esegue personalmente o si fa aiutare da colleghi fidati. Non avendo il dono dell'ubiquita, la cosa più semplice per contattarlo è mandargli una mail. Quando smette di viaggiare, le legge tutte insieme ed organizza il trasporto successivo mettendosi d'accordo personalmente col cliente.</p>
                        </div>
                    </div>
                    <div class="col-m-4 thecontent">
                        <img src="<?php bloginfo('template_url'); ?>/img/what.svg" alt="" id="what">
                        <div class="description">
                            <h2>Cosa trasporto</h2>
                            <p class="">Dai clavincembali antichi alle Porsche da collezione, passando per i pacchi viveri della mamma, bagagli, moto, bici, quadri, libri, acquari e arredamenti. </p><p>Tutto ciò che è lecito, io posso trasportarlo per te. </p>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <section id="map">
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-m-12">
<!--                         <h2 class="title centered">Contatti</h2>
                        <p class="centered">Contattami tramite il modulo e ti risponderò nel più breve tempo possibile.</p> -->
                        <h2 class="title centered"><?php echo CFS()->get( 'contact_title' ); ?></h2>
                        <p class="centered"><?php echo CFS()->get( 'contact_text' ); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-m-6 withpadding">
                        <div class="details">
                            <div class="address">
                                <p>Italo Summa</p>
                                <p>Penningweg 112C</p>
                                <p>1507 DH Zaandam</p>
                            </div>
                            <ul class="socials">
                                <li><a href="tel:+31 (0)6 19148204"><i class="fa fa-phone-square"></i>+31 (0)6 19148204</a></li>
                                <li><a href="mailto:italo.courier@gmail.com"><i class="fa fa-envelope-square"></i>italo.courier@gmail.com</a></li>
                                <li><a href="https://www.facebook.com/ItaloExpress/"><i class="fa fa-facebook-square"></i>Italo Express Courier</a></li>
                            </ul>
                            <div class="filetodownload">
                                <p>Scarica il modulo di richiesta:</p>
                                <a href="<?php bloginfo('template_url'); ?>/pdf/lettera_di_vettura.pdf" target="_blank" download>
                                    <i class="fa fa-file-pdf-o"></i>
                                    Modulo
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-m-6 withform">
                        <?php echo do_shortcode( '[caldera_form id="CF587d2bc4d8dd1"]' ) ?>
                    </div>
                </div>
            </div>
        </section>

    </main>

<?php
get_footer();