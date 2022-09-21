             <!-- banner start  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}
    <style>
        .containa {
   background-size: 100%;
    height: 150px;
    border-radius: 15px;
  }
  .service-title{
    background-color: rgb(209, 2, 2, 0.5);
    color: #fff;
    border-radius: 10px;
    padding: 10px;
    margin: 10px;
  }
  .image {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 15px;
  }
  
  .overlay {
    position: absolute;
    bottom: 100%;
    left: 0;
    right: 0;
    background-color: #11a2f0;
    overflow: hidden;
    width: 100%;
    height:0;
    transition: .5s ease;
    border-radius: 15px;
  }
  
  .containa:hover .overlay {
    bottom: 0;
    height: 100%;
    border-radius: 15px;
  }
  
  .text {
    color: white;
    font-size: 12px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }
        .cat1{
          background-color: #11a2f0;
          border-radius: 10px;
          padding: 20px;
          margin: 10px;
          height: 70px;
        }
        .cat1:hover{
          border-radius: 50px;
        }
        .cat2{
          background-color: #07ed89;
          border-radius: 10px;
          padding: 20px;
          margin: 10px;
          height: 70px;
        }
        .cat2:hover{
          border-radius: 50px;
        }
        .cat3{
          background-color: #076bed;
          border-radius: 10px;
          padding: 20px;
          margin: 10px;
          height: 70px;
        }
        .cat3:hover{
          border-radius: 50px;
        }
        .cat4{
          background-color: #b0040f;
          border-radius: 10px;
          padding: 20px;
          margin: 10px;
          height: 70px;
        }
        .cat4:hover{
          border-radius: 50px;
        }
  
  .search2{
      display: none;
  }
  .banna{
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: 100%;
    height: 30vw;
  }
  .slide-title{
    color: #d10202;
    animation: 3s infinite alternate slidein;
  }
  .sub-tile{
    color: #700101;
    animation-duration: 3s;
    animation-name: slidein;
  }
  .about-section{
    margin-left: -100px; margin-top: 50px; margin-bottom: 50px;
    border-radius: 15px;
  }
  .icon-div{
    background-color: rgba(23, 179, 252, 0.3);
    border-radius: 100%;
    padding: 5px;
    margin-right: 10px;
    width: 30px;
    height: 30px;
  }
  .icon-div:hover{
    background-color: rgba(23, 179, 252, 0.8);
  }
  .location{
    background-color: rgba(23, 179, 252, 0.1); display: flex;
  }
  .location:hover{
    background-color: rgba(23, 179, 252, 0.5);
  }
  .buttons{
    border-radius: 50px;
    background-color: #d10202;
    padding-left: 30px;
    padding-right: 30px;
    border: none;
    padding-top: 10px;
    padding-bottom: 10px;
    color: #fff;
    margin-top: 10px;
    animation-duration: 4s;
    animation-name: slidein;
  }
  .buttons:hover{
    background-color: #fff;
    border: 2px #d10202 solid;
    color: #d10202;
  }
  .bottom-cons{
    font-size: 20px;
    margin-left: 13px;
  }
  #aboutt{
    margin-top: 120px; margin-left: 35px;
  }
  @media (max-width:768px){
      .search2{
          display: block;
    }
    .slide-title{
   margin-top: -70px;
   font-size: smaller;
  }
  .about-section{
    margin-left: 1px; margin-top: 50px; margin-bottom: 50px;
  }
  #aboutt{
    margin-top: 10px; margin-left: -1px;
  }
  .sub-tile{
    font-size: x-small;
  }
  .buttons{
    font-size: x-small;
    margin-top: -5px;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 5px;
    padding-bottom: 5px;
  
  }
    #indicators{
      display: none;
    }
    .search{
          display: none;
    }
  }
      </style>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-7 p-1 d-flex" style="background-color: rgba(23, 179, 252, 0.2);">
              <div class="col-md-9">
                <img id="aboutt" src="https://res.cloudinary.com/dtlkiv19d/image/upload/v1663505365/Kallery/about_xafikm.png" style="width: 80%;" alt="...">
              </div>
              <div class="col-md-3">
    
              </div>
               
            </div>
            <div class="col-md-5">
                <div class="p-5 bg-white about-section shadow-sm">
                    <h3 class="slide-title" data-aos="fade-up-left">About Us</h3>
                    <div class="bg-white rounded-3 bg-gray-100" data-aos="fade-up-left" data-aos-duration="1000">
                      Surs Healthcare and Diagnostic Laboratory is an indegneous medical facility that was started way back in 2014 as a small single room clinic in Seeta Mukono and operated as Jubilee Medical Center It was later moved to Kampala in 2016 and rebranded as SURS HEALTHCARE, Surs has grown over the years fron a single room to a big facility and having a sister branch in Kinawataka Mbuya.
                    </div>
                    <h5 class="slide-title mt-3">Our Branches</h5>
                    <div class="p-3 rounded-3 location" data-aos="fade-up-left" data-aos-duration="1000">
                     <div class="icon-div"><i style="color:#076bed;" class="bi bi-geo-alt-fill"></i></div> <div><p>Surs Healthcare & Diagnostic Laboratory, Bombo Rd, Master Plaza level 2 Kampala Opposite Watoto</p> </div>
        
                    </div>
                    <div class="p-3 rounded-3 mt-1 location" data-aos="fade-up-left" data-aos-duration="1000">
                      <div class="icon-div" ><i style="color:#076bed;" class="bi bi-geo-alt-fill"></i></div> <div><p>Surs Healthcare & Diagnostic Laboratory Surs Healthcare Kinawataka- Mbuya plot 75</p> </div>
                      
                    </div>
                 
                </div>
            </div>
    
        </div>
    
    </div>
    
    <div class="container">
      <center>
        <h3 class="slide-title" data-aos="fade-up-left">Our Services</h3>
      </center>
    
        <div class="row" my-1>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536047/Kallery/acovi_aucy9e.jpg');">
                <h5 class="service-title">Covid 19 Testing</h5>
                <div class="overlay">
                  <p class="text">We offer Covid 19 Testing</p>
                </div>
              </div>           
            </div>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536047/Kallery/aabbas_ebbbza.jpg');">
                <h5 class="service-title">Maternity/Antenatal Services</h5>
                <div class="overlay">
                  <p class="text">We offer full Maternity/Antenatal & Postnatal Services to our mothers</p>
                </div>
                
              </div>
             
            </div>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536047/Kallery/aabbas_ebbbza.jpg');">
                <h5 class="service-title">ENT</h4>
                  <div class="overlay">
                    <p class="text">Duration varies · 50000 Consultations</p>
                  </div>
                
              </div>         
            </div>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536048/Kallery/aabcdf_abp0fx.jpg');">
                <h5 class="service-title">Family Planing</h5> 
                <div class="overlay">
                  <p class="text">
                    All methods of family family Planning for all age brackets 
                  </p>
                </div>
              </div>   
        </div>
      </div>
        <div class="row my-1">
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536048/Kallery/aadbb_wyqapo.jpg');">
                <h5 class="service-title">Physiotherapy</h5>
                <div class="overlay">
                  <p class="text">45 minutes · 30000@ Session therapy</p>
                </div>          
              </div>           
            </div>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536048/Kallery/aacb_cbeitr.jpg');">
                <h5 class="service-title">Ultrasound Scan</h5>
                <div class="overlay">
                  <p class="text">
                    Duration varies · 30000
                    Obstetric & Gynaecological</p>
                </div>          
              </div>           
            </div>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536048/Kallery/aabbb_eyi1rc.jpg');">
                <h5 class="service-title">Preemployment Medical Examination</h5>
                <div class="overlay">
                  <p class="text">
                    We do medical examinations and physical examination for recruiting companies.
                    we perform test like:  HIV, HEP B, HEP C, TPHA, HCG, SERUM TB, and many more
                  </p>  
                </div>       
              </div>            
            </div>
            <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
              <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536048/Kallery/aaabc_th3xhd.jpg');">
                <h5 class="service-title">School Healthcare Services</h5>
                <div class="overlay">
                  <p class="text">As a means of ensuring that all students are Healthy at School, we offer Medical Examinations for Schools and Institutions and screen them for Infectious diseases and Physical Competencies </p>
                </div>          
              </div>          
            </div>
        
        </div>
        <div class="row my-1">
          <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
            <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663573907/Kallery/aaasurs_jktbga.jpg');">
              <h5 class="service-title">Clinical Laboratory Consultancy</h5>
              <div class="overlay">
                <p class="text">We offer Consultancy services in Laboratory Design, Lay out, Equipment Purchase, Laboratory Consumables, Registration, Quality improvement, Staffing and Software for Laboratories</p>
              </div>
            </div>          
          </div>
          <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
            <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536048/Kallery/aabava_tje77c.jpg');">
              <h5 class="service-title">Vaccination</h5>
              <div class="overlay">
                <p class="text">Hepatitis B, Hepatitis A, Typhoid, Influenza (flu), Tetanus, Cervical Cancer, Measles, Yellow fever, Rubella and many more. GET VACCINATED NOW Contact us for the service, we find you at your home, office, shop </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
            <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663573907/Kallery/aaasurs1_lrufm9.jpg');">
              <h5 class="service-title">Online Laboratory & Medical Consultancy</h5>
              <div class="overlay">
                <p class="text">No need to travel to see the Dr. Lab Tech or any other health professionals just contact us WhatsApp, Email and get the answer immediately. Be the only one on the queue and waste no time & money
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 p-2 rounded-3" data-aos="zoom-in-down">
            <div class="p-2 containa" style="background-image: url('https://res.cloudinary.com/dtlkiv19d/image/upload/v1663536049/Kallery/aabike_adb5ps.png');">
              <h5 class="service-title">Mobile Laboratory Services</h5>
              <div class="overlay">
                <p class="text">We pick samples from anywhere in Kampala and neighboring suburbs, at your office, home, shop or stall, Clinic, Hospital, Laboratory, School.. and perform tests, deliver results both in hard and soft copies while  maintaining the  medical ethical principles. </p>
              </div>
            </div>
          </div>
      
      </div>
    </div>
    
    <nav class="navbar fixed-bottom search2 navbar-light bg-light">
      <div class="container-fluid d-flex">
        <div class="col-md-3 p-2"><i class="bi bi-house-door bottom-cons"></i><br/> Home
          </div>
        <div class="col-md-3 p-2"><i class="bi bi-capsule bottom-cons"></i><br/> Orders</div>
        <div class="col-md-3 p-2"><i class="bi bi-check2-circle bottom-cons"></i><br/>Checkout</div>
        <div class="col-md-3 p-2"><i class="bi bi-person bottom-cons"></i><br/>Account</div>
      </div>
    </nav>
          <!-- about us end-->
            
</body>
</html>

            
              <!-- banner end  -->