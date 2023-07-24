<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
<style>

        @font-face {
            font-family: 'AlArabiya-Regular';
            src: url('/fonts/Alarabiya.ttf') format('truetype');
            }
    
        
        .projet-title {
            position: absolute;
            top: 38%; 
            right: 20%; 
            color: rgb(123, 40, 187); 
            font-size: 48px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 65%; 
            padding: 10px; 
        }
        .porteur-name {
            position: absolute;
            top: 65%; 
            right: 30%; 
            color: black; 
            font-size: 28px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 40%; 
            padding: 10px; 
        }
        .slide2-porteur {
            position: absolute;
            top: 30%; 
            right: 10%; 
            color: rgb(123, 40, 187);
            font-size: 28px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide2-forme {
            position: absolute;
            top: 47%; 
            right: 60%; 
            color: black ;
            font-size: 38px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide2-date {
            position: absolute;
            top: 61%; 
            right: 60%; 
            color: black ;
            font-size: 38px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide2-secteur {
            position: absolute;
            top: 74%; 
            right: 60%; 
            color: black ;
            font-size: 38px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide2-commune {
            position: absolute;
            top: 88%; 
            right: 60%; 
            color: black ;
            font-size: 38px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide2-associes {
            position: absolute;
            top: 77%; 
            right: 14%; 
            color: rgb(123, 40, 187);
            font-size: 38px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide3-projet {
            position: absolute;
            top: 28%; 
            right: 15%; 
            color: rgb(123, 40, 187); 
            font-size: 36px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right; 
            width: 80%; 
            padding: 10px; 
        }
        .slide3-details {
            position: absolute;
            top: 47%; 
            right: 7%; 
            color: black; 
            font-size: 33px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: justify; 
            width: 80%; 
            padding: 10px; 
        }
        .slide4-offres {
            position: absolute;
            top: 50%; /* Adjust as needed */
            right: 10%; /* Adjust as needed */
            color: black;
            font-size: 36px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 65%;
            padding: 10px;
        }
        .slide4-clients {
            position: absolute;
            top: 50%; /* Adjust as needed */
            right: 13%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .slide4-fournisseurs {
            position: absolute;
            top: 50%; /* Adjust as needed */
            right: 39%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .slide4-concurrents {
            position: absolute;
            top: 50%; /* Adjust as needed */
            right: 65%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-invest5-6 {
            position: absolute;
            top: 38%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-invest7-8 {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-invest3-9 {
            position: absolute;
            top: 52%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-invest1-2-4-10 {
            position: absolute;
            top: 60%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-all-invest {
            position: absolute;
            top: 69%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: white;
            font-size: 36px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-all-apport {
            position: absolute;
            top: 38%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-all-subvention {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-all-emprunt {
            position: absolute;
            top: 52%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: black;
            font-size: 30px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .total-finance {
            position: absolute;
            top: 69%; /* Adjust as needed */
            right: 50%; /* Adjust as needed */
            color: white;
            font-size: 36px;
            font-family: 'AlArabiya-Regular', sans-serif;
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CA_N1 {
            position: absolute;
            top: 38%; /* Adjust as needed */
            right: 55%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CA_N2 {
            position: absolute;
            top: 38%; /* Adjust as needed */
            right: 68%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CA_N3 {
            position: absolute;
            top: 38%; /* Adjust as needed */
            right: 81%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CHVar_N1 {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 55%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CHVar_N2 {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 68%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CHVar_N3 {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 81%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-Resultat_N1 {
            position: absolute;
            top: 60%; /* Adjust as needed */
            right: 55%; /* Adjust as needed */
            color: white;
            font-size: 24px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-Resultat_N2 {
            position: absolute;
            top: 60%; /* Adjust as needed */
            right: 68%; /* Adjust as needed */
            color: white;
            font-size: 24px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-Resultat_N3 {
            position: absolute;
            top: 60%; /* Adjust as needed */
            right: 81%; /* Adjust as needed */
            color: white;
            font-size: 24px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CH_N1 {
            position: absolute;
            top: 52%; /* Adjust as needed */
            right: 55%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CH_N2 {
            position: absolute;
            top: 52%; /* Adjust as needed */
            right: 68%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }
        .projet-CH_N3 {
            position: absolute;
            top: 52%; /* Adjust as needed */
            right: 81%; /* Adjust as needed */
            color: black;
            font-size: 20px;
            
            text-align: right;
            width: 24%;
            padding: 10px;
        }

        
</style>

<div class="top-bar">
    <!-- Top bar content goes here -->
  </div>

  <!-- Filament Sidebar -->
  <div class="filament-sidebar">
    <!-- Sidebar content goes here -->
  </div>

  <!-- Your other content goes here -->

  <style>
    /* CSS to hide the Filament Top Bar */
    .top-bar {
      display: none;
    }

    /* CSS to hide the Filament Sidebar */
    .filament-sidebar {
      display: none;
    }
  </style>


<div class="swiper">
  
  <div class="swiper-wrapper">
    
    <div class="swiper-slide">
        
        <img src="/images/slides/1.png" alt="">
                
                <div class="projet-title">
                    {{ $record->Title_ar }}
                </div>
                
                <div class="porteur-name">
                    {{ isset($record->porteur->Name_ar) ? $record->porteur->Name_ar : '' }}
                </div>
    </div>
    <div class="swiper-slide">
        <img src="/images/slides/2.png" alt="">
                <div class="slide2-porteur">
                    {{ isset($record->porteur->Name_ar) ? $record->porteur->Name_ar : '' }}
                </div>
                <div class="slide2-date">
                    {{ isset($record->porteur->Name_ar) ? $record->porteur->Date_creation->format('Y-m-d') : '' }}
                </div>
                <div class="slide2-forme">
                    {{ isset($record->porteur->Name_ar) ? $record->porteur->formeJuridique->Title_ar : '' }}
                </div>
                <div class="slide2-secteur">
                    {{ isset($record->porteur->Name_ar) ? $record->porteur->secteurActvite->Title_ar : '' }}
                </div>
                <div class="slide2-commune">
                جـمــاعــة  {{ isset($record->porteur->Name_ar) ? $record->porteur->commune->Title_ar : '' }}
                </div>
                <div class="slide2-associes">
                    {{$record->porteur->associes->count()}}
                </div>
    </div>
    <div class="swiper-slide">
        <img src="/images/slides/3.png" alt="">
                <div class="slide3-projet">
                    {{ $record->Title_ar }}
                </div>
                <div class="slide3-details">
                    {{ $record->Detail_ar }}
                </div>
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/4.png" alt="">
        <div class="slide4-offres">
            <ul>
                @foreach ($record->offres->take(4) as $offre)
                    <li>{{ $offre->Title_ar }}</li>
                @endforeach
            </ul>
        </div>


    
    
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/5.png" alt="">
        <div class="slide4-clients">
            <ul>
                @foreach ($record->clients->take(3) as $client)
                    <li>{{ $client->Title_ar }}</li>
                @endforeach
            </ul>
        </div>
        <div class="slide4-fournisseurs">
            <ul>
                @foreach ($record->fournisseurs->take(3) as $fournisseur)
                    <li>{{ $fournisseur->Title_ar }}</li>
                @endforeach
            </ul>
        </div>
        <div class="slide4-concurrents">
            <ul>
                @foreach ($record->concurrents->take(3) as $concurrent)
                    <li>{{ $concurrent->Title_ar }}</li>
                @endforeach
            </ul>
        </div>
        
        

    
    
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/6.png" alt="">

        <div class="slide6-content">
            <div class="total-invest5-6">
            
            <?php
                // Calculate the total Invest_N1 for Actif Postes 5 and 6 combined
                $totalInvestN1ForActifPoste5And6 = 0;
                foreach ($record->investissements as $investissement) {
                if ($investissement->actif_poste_id == 5 || $investissement->actif_poste_id == 6) {
                    $totalInvestN1ForActifPoste5And6 += $investissement->Invest_N1;
                }
                }
                $formattedTotalInvestN15And6 = number_format($totalInvestN1ForActifPoste5And6, 2, ',', ' ');

            ?>
            
            <p>{{ $formattedTotalInvestN15And6 }} DH</p>
            </div>
            <div class="total-invest7-8">
            
            <?php
                // Calculate the total Invest_N1 for Actif Postes 5 and 6 combined
                $totalInvestN1ForActifPoste7And8 = 0;
                foreach ($record->investissements as $investissement) {
                if ($investissement->actif_poste_id == 7 || $investissement->actif_poste_id == 8) {
                    $totalInvestN1ForActifPoste7And8 += $investissement->Invest_N1;
                }
                }
                $formattedTotalInvestN17And8 = number_format($totalInvestN1ForActifPoste7And8, 2, ',', ' ');

            ?>
            
            <p>{{ $formattedTotalInvestN17And8 }} DH</p>
            </div>
            <div class="total-invest3-9">
            
            <?php
                // Calculate the total Invest_N1 for Actif Postes 5 and 6 combined
                $totalInvestN1ForActifPoste3And9 = 0;
                foreach ($record->investissements as $investissement) {
                if ($investissement->actif_poste_id == 3 || $investissement->actif_poste_id == 9) {
                    $totalInvestN1ForActifPoste3And9 += $investissement->Invest_N1;
                }
                }
                $formattedTotalInvestN13And9 = number_format($totalInvestN1ForActifPoste3And9, 2, ',', ' ');

            ?>
            
            <p>{{ $formattedTotalInvestN13And9 }} DH</p>
            </div>
            <div class="total-invest1-2-4-10">
            
            <?php
                // Calculate the total Invest_N1 for Actif Postes 5 and 6 combined
                $totalInvestN1ForActifPosteAutre = 0;
                foreach ($record->investissements as $investissement) {
                if ($investissement->actif_poste_id == 1 || $investissement->actif_poste_id == 2 || $investissement->actif_poste_id == 4 || $investissement->actif_poste_id == 10) {
                    $totalInvestN1ForActifPosteAutre += $investissement->Invest_N1;
                }
                }
                
                $formattedTotalInvestN1Autre = number_format($totalInvestN1ForActifPosteAutre, 2, ',', ' ');

                ?>
                
                <p>{{ $formattedTotalInvestN1Autre }} DH</p>
            </div>
            <div class="total-all-invest">
                <?php
                // Calculate the total of all investments
                $totalAllInvestments = 0;
                foreach ($record->investissements as $investissement) {
                    $totalAllInvestments += $investissement->Invest_N1;
                }
                $formattedTotalAllInvestments = number_format($totalAllInvestments, 2, ',', ' ');
                ?>

                <p>{{ $formattedTotalAllInvestments }} DH</p>
            </div>


            
            
        </div>

    
    
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/7.png" alt="">

        

    
    
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/8.png" alt="">

            <div class="total-all-apport">
                <?php
                // Calculate the total of all investments
                $totalAllapports = 0;
                foreach ($record->apports as $apport) {
                    $totalAllapports += $apport->Montant_N1;
                }
                $formattedTotalAllapports = number_format($totalAllapports, 2, ',', ' ');
                ?>

                <p>{{ $formattedTotalAllapports }} DH</p>
            </div>

            <div class="total-all-subvention">
                <?php
                // Calculate the total of all investments
                $totalAllsubventions = 0;
                foreach ($record->subventions as $subvention) {
                    $totalAllsubventions += $subvention->Montant_N1;
                }
                $formattedTotalAllsubventions = number_format($totalAllsubventions, 2, ',', ' ');
                ?>

                <p>{{ $formattedTotalAllsubventions }} DH</p>
            </div>

            <div class="total-all-emprunt">
                <?php
                // Calculate the total of all investments
                $totalAllemprunts = 0;
                foreach ($record->emprunts as $emprunt) {
                    $totalAllemprunts += $emprunt->Montant_N1;
                }
                $formattedTotalAllemprunts = number_format($totalAllemprunts, 2, ',', ' ');
                ?>

                <p>{{ $formattedTotalAllemprunts }} DH</p>
            </div>

            <div class="total-finance">
                <?php
                // Calculate the total finance
                $totalFinance = $totalAllapports + $totalAllsubventions + $totalAllemprunts;
                $formattedTotalFinance = number_format($totalFinance, 2, ',', ' ');
                ?>

                <p>{{ $formattedTotalFinance }} DH</p>
            </div>

        

    
    
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/9.png" alt="">

        <div class="projet-CA_N1">
            <?php
            // Format Total_CA_N1 as money
            $formattedTotalCAN1 = number_format($record->Total_CA_N1, 2, ',', ' ');
            ?>
            {{ $formattedTotalCAN1 }}
        </div>
        
        <div class="projet-CA_N2">
            <?php
            // Format Total_CA_N2 as money
            $formattedTotalCAN2 = number_format($record->Total_CA_N2, 2, ',', ' ');
            ?>
            {{ $formattedTotalCAN2 }}
        </div>
        
        <div class="projet-CA_N3">
            <?php
            // Format Total_CA_N3 as money
            $formattedTotalCAN3 = number_format($record->Total_CA_N3, 2, ',', ' ');
            ?>
            {{ $formattedTotalCAN3 }}
        </div>

        <div class="projet-CHVar_N1">
            <?php
            // Format Total_CA_N1 as money
            $formattedTotalCHVarN1 = number_format($record->Total_CHVar_N1, 2, ',', ' ');
            ?>
            {{ $formattedTotalCHVarN1 }}
        </div>
        
        <div class="projet-CHVar_N2">
            <?php
            // Format Total_CA_N2 as money
            $formattedTotalCHVarN2 = number_format($record->Total_CHVar_N2, 2, ',', ' ');
            ?>
            {{ $formattedTotalCHVarN2 }}
        </div>
        
        <div class="projet-CHVar_N3">
            <?php
            // Format Total_CA_N3 as money
            $formattedTotalCHVarN3 = number_format($record->Total_CHVar_N3, 2, ',', ' ');
            ?>
            {{ $formattedTotalCHVarN3 }}
        </div>

        <div class="projet-Resultat_N1">
            <?php
            // Format Total_CA_N1 as money
            $formattedTotalResultatN1 = number_format($record->Resultat_N1, 2, ',', ' ');
            ?>
            {{ $formattedTotalResultatN1 }}
        </div>
        
        <div class="projet-Resultat_N2">
            <?php
            // Format Total_CA_N2 as money
            $formattedTotalResultatN2 = number_format($record->Resultat_N2, 2, ',', ' ');
            ?>
            {{ $formattedTotalResultatN2 }}
        </div>
        
        <div class="projet-Resultat_N3">
            <?php
            // Format Total_CA_N3 as money
            $formattedTotalResultatN3 = number_format($record->Resultat_N3, 2, ',', ' ');
            ?>
            {{ $formattedTotalResultatN3 }}
        </div>

        <?php
            $CH_N1 = $record->Total_CA_N1 - $record->Total_CHVar_N1 - $record->Resultat_N1;
            $formattedCH_N1 = number_format($CH_N1, 2, ',', ' ');
            ?>
        <div class="projet-CH_N1">
            {{ $formattedCH_N1 }}
        </div>
        <?php
            $CH_N2 = $record->Total_CA_N2 - $record->Total_CHVar_N2 - $record->Resultat_N2;
            $formattedCH_N2 = number_format($CH_N2, 2, ',', ' ');
        ?>
        <div class="projet-CH_N2">
            {{ $formattedCH_N2 }}
        </div>
        <?php
            $CH_N3 = $record->Total_CA_N3 - $record->Total_CHVar_N3 - $record->Resultat_N3;
            $formattedCH_N3 = number_format($CH_N3, 2, ',', ' ');
        ?>
        <div class="projet-CH_N3">
            {{ $formattedCH_N3 }}
        </div>
                

    
    
    </div>

    <div class="swiper-slide">
        <img src="/images/slides/10.png" alt="">

    
    
    </div>

    
</div>
  
  

  
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


<script>
    const outerSwiper = new Swiper('.swiper', {
        loop: true,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Add any other Swiper options you need here
    });
</script>


