<?php
$servicesDb = "./panel/db/services.json";
$servicesData = file_get_contents($servicesDb);
$servicesJSON = json_decode($servicesData, true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Optimus Tea</title>
  <meta name="description" content="Discover Optimus Tea's premium instant tea premixes, masala chai powders, and vending machine-ready tea premixes. Our Cardamom tea , masala tea , ginger tea and instant tea powder with milk and sugar offer convenience and authentic flavor in every cup. 'Your cup of tea' made easy.">
  <meta name="keywords" content="instant tea premix, girnar masala tea, instant masala chai, tea premix for vending machine, instant tea powder with milk and sugar, instant tea premix powder, Optimus Tea, Your cup of tea, cardamom, ginger, masala, coffee, instant tea powder">

  <link rel="stylesheet" href="./assets/css/style.css" />
  <script src="./assets/js/tailwind.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="./assets/js/script.js"></script>
</head>

<body>
  <div id="fullPage" class="hero h-screen text-white relative" style="background-image: url('./assets/img/bg/bg-xl.png'); background-size: cover">
    <!-- // whatsapp widget -->
    <div id="whatsapp-widget" class="w-[350px] rounded-lg bg-[#E6DDD4] fixed bottom-10 right-[7px] lg:right-20 transition-all duration-300 ease-in-out" style="background-image: url('https://res.cloudinary.com/eventbree/image/upload/v1575782560/Widgets/whatsappbg_opt.jpg'); object-fit: cover; z-index: 999; display: none">
      <div class="w-full h-[70px] bg-[#0A5F54] flex items-center gap-2 p-3" style="border-radius: 8px 8px 0px 0px">
        <div class="w-[40px] h-[40px] rounded-full bg-white flex items-center justify-center overflow-hidden">
          <img src="./assets/logo/Prev/Optimus_tea_Logo-02_Mockup_sq.jpg" class="object-fit-cover" alt="whatsapp-dp" />
        </div>
        <div class="flex flex-col">
          <h4 class="name">Optimus Tea</h4>
          <p class="status">Welcome to our shop !</p>
          <button onclick="removeMsgContainer()" class="absolute transition-all duration-300 ease-in-out top-0 right-0 bg-red-400 hover:bg-red-500 px-5" style="border-radius: 0px 8px 0px 8px">
            <i class="fa-solid fa-xmark text-lg"></i>
          </button>
        </div>
      </div>
      <div class="msg-container px-5 w-full h-[70%]">
        <p class="text-center text-black py-3 font-[500]">Today</p>
        <div class="msg-box w-[95%] bg-white h-[80px] rounded-lg border p-3">
          <h4 class="text-[18px] text-[#818181] font-bold" style="font-weight: 500">Optimus Tea</h4>
          <!-- HTML -->
          <p class="text-[16px] text-[#000] animate-left-to-right message">How Can I help you ?</p>
        </div>
        <div class="flex justify-between items-center gap-2 py-3">
          <input id="textInput" type="text" placeholder="Enter your message" class="w-[85%] outline-none text-black font-[500] text-sm p-2 py-3 rounded-full my-3 border" style="position: relative; z-index: 1000" />
          <a class="sendIcon w-[45px] h-[45px] rounded-full bg-[#128C7F] flex items-center justify-center cursor-pointer z-[99]" onclick="sentMsg()">
            <i class="fa-solid fa-paper-plane"></i>
          </a>
        </div>
      </div>
    </div>

    <div id="wp-icon" onclick="iconPress()" class="animate-right-to-left w-[60px] h-[60px] cursor-pointer rounded-full fixed bottom-10 right-10 bg-[#03BB31] hover:bg-green-700 transition-all duration-300 ease-in-out z-[99999] flex justify-center items-center text-[40px]">
      <i class="fa-brands fa-whatsapp"></i>
    </div>
    <!-- // -->
    <!-- // pop up  -->

    <div id="popUp" class="hidden w-full h-full bg-transparent absolute bg-red-200 backdrop-blur-lg z-[999]">
      <div style="z-index: 9999;" class="p-3 relative w-[350px] rounded-lg bg-[#E6DDD4] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] transition-all duration-300 ease-in-out">
        <div class="w-[100%] h-[400px] flex flex-col justify-center items-center px-3 py-2 gap-y-1 rounded-xl shadow-xl">
          <img src="./assets/img/images/chai_cup.png" class="h-[60%] object-cover rounded-lg" alt="" />
          <p class="text-lg text-black italic">Your cup of tea is ready !</p>
          <!-- <p class="text-sm mt-0 w-full h-[60px] overflow-hidden whitespace-pre-line truncate">Your cup Of tea is ready</p> -->
          <a href="https://wa.me/+918141100044/?text=I want to order Instant Tea Premix, <?= '%0A%0A' . urlencode("Give me more details") ?>" class="text-center mt-2 rounded-full w-full px-3 py-2 bg-[#F64B3C] hover:bg-red-600 transition-all duration-300 ease-in-out text-white font font-bold">Order Now</a>
        </div>
        <button onclick="xMark()" class="absolute transition-all duration-300 ease-in-out top-0 right-0 bg-red-400 hover:bg-red-500 px-5" style="border-radius: 0px 8px 0px 8px">
          <i class="fa-solid fa-xmark text-lg"></i>
        </button>
      </div>
    </div>
    <script>
      var popUp = document.getElementById('popUp');
      var fullPage = document.getElementById('fullPage');

      setTimeout(() => {
        if (!localStorage.getItem('isPop')) {
          popUp.style.display = 'block';
          fullPage.style.overflow = 'hidden'
          popUp.classList.add = 'h-screen w-screen'
          localStorage.setItem('isPop', 'true');
        }
      }, 5000);

      function xMark() {
        popUp.style.display = 'none';
        fullPage.style.removeProperty('overflow');
      }
    </script>
    <!-- / -->

    <div class="nav flex justify-between items-center px-5 lg:px-[80px] py-3 top-0 fixed w-full z-[99]" id="navbar">
      <div class="logo">
        <img src="./assets/logo/Source/Optimus_tea_Logo-01.png" class="w-[100px] rounded-md" alt="" />
      </div>
      <div class="lists flex">
        <div class="hidden md:flex space-x-[50px] font-bold text-lg">
          <a class="hover:text-[#DC2626] transition-all duration-300 ease-in-out" href="./index.php">HOME</a>
          <a class="hover:text-[#DC2626] transition-all duration-300 ease-in-out" href="./index.php#product">PRODUCT</a>
          <a class="hover:text-[#DC2626] transition-all duration-300 ease-in-out" href="./index.php#about">ABOUT</a>
          <a class="hover:text-[#DC2626] transition-all duration-300 ease-in-out" href="./index.php#contact">CONTACT</a>
        </div>
        <button class="px-4 py-2 md:hidden" id="show" onclick="toggleChange('show')">
          <i class="fa-solid fa-bars text-lg"></i>
        </button>
        <div>
          <div id="btnWrapper" class="z-[999] md:hidden" style="position: absolute; top: 10px; right: 10px; transition: right 0.5s">
            <button class="px-4 py-2 bg-yellow-300 rounded mt-3" style="display: none" id="close" onclick="toggleChange('close')">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
          <div class="md:hidden">
            <div class="text-black bg-slate-600 z-[99] py-[320px]" style="width: 400px; height: screen; position: absolute; top: 0; right: -400px; transition: right 0.5s; color: black" id="sidebar">
              <div class="flex flex-col items-center space-y-3 text-[22px] text-white space">
                <a class="hover:text-zinc-200 transition-all duration-300 ease-in-out" href="./index.php">HOME</a>
                <a class="hover:text-zinc-200 transition-all duration-300 ease-in-out clicked" href="./index.php#product">PRODUCT</a>
                <a class="hover:text-zinc-200 transition-all duration-300 ease-in-out clicked" href="./index.php#about">ABOUT</a>
                <a class="hover:text-zinc-200 transition-all duration-300 ease-in-out clicked" href="./index.php#contact">CONTACT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="home" class="px-5 md:px-11 lg:px-[60px] h-[100vh] flex flex-col-reverse lg:flex-row items-center relative pt-11">
      <div class="hero-left w-full lg:w-[45%] h-[50%] flex flex-col lg:justify-center space-y-5">
        <h1 class="text-[35px] text-center lg:text-start text-nowrap md:text-[70px] lg:text-[80px] font-bold leading-[1.2]">
          Get Cashback <br />
          up to 50%
        </h1>
        <p class="text-sm md:text-lg lg:pr-11">
          Welcome to Optimus Tea, where every sip embodies the warmth and comfort of homemade tea with the convenience of instant preparation. Our journey began with a simple yet profound idea: to craft a tea experience that evokes the cherished memories of home, shared conversations, and cherished moments.
        </p>
      </div>
      <div class="lg:hidden lg:flex-1 w-[300px] h-[300px] lg:w-[400px] lg:h-[400px] flex justify-center items-end p-5">
        <img style="user-select: none" src="./assets/img/images/chai_cup.png" class="w-full h-full mt-8" alt="tea-cup" />
      </div>
      <!-- <p class="text-[30px] italic leading-[1.2] absolute bottom-[60px] right-20">Your Cup of Tea is Ready !</p> -->
    </div>

    <div class="w-full bg-[#F6EEDF] flex px-5 lg:px-[80px] gap-5 flex flex-col lg:flex-row py-[60px]">
      <div class="w-full lg:w-[50%] h-full flex flex-col lg:flex-row items-center justify-center">
        <div class="p-2 bg-[#F4F4F5] rounded-lg shadow">
          <img src="./assets/img/products/cardamom.png" class="w-full lg:w-[500px] rounded-lg shadow-lg" alt="" />
        </div>

      </div>
      <div class="w-full lg:w-[50%] text-black flex flex-col justify-center">
        <h1 class="text-[30px] lg:text-[70px] font-bold text-center lg:text-start">Cardamom</h1>
        <p class="font-[500] md:text-bold text-sm lg:text-lg pb-5">
          Cardamom, the "Queen of Spices," reigns supreme in the world of culinary delights. Its fragrance is like a symphony of exotic aromas, with hints of citrus, mint, and a touch of sweetness. Cardamom adds an unparalleled depth of flavor.
        </p>
        <a href="https://wa.me/+918141100044/?text=I%20want%20to%20order:%20'Cardamom'%20.%20%0A%0A<?= urlencode('Give me more details') ?>" class="rounded-full text-center w-full lg:w-[50%] px-5 py-3 bg-[#F64B3C] hover:bg-red-600 transition-all duration-300 ease-in-out text-white font-bold">
          Order Now
        </a>
      </div>
    </div>

    <div class="w-full h-[100vh] bg-[#F64B3C] flex px-5 lg:px-[80px] gap-3 flex flex-col-reverse lg:flex-row py-[60px]">
      <div class="w-full lg:w-[50%] text-white flex flex-col justify-center">
        <h1 class="text-[30px] lg:text-[70px] font-bold text-center lg:text-start text-nowrap">Masala</h1>
        <p class="font-[500] md:text-bold text-sm lg:text-lg pb-5">

          Introducing our Masala Instant Tea Premix, a harmonious blend of spices and tea that promises to tantalize your taste buds with every sip. Crafted with precision and care, this delightful concoction captures the essence of traditional Indian chai, infused with a medley of aromatic spices such as cardamom, cinnamon, cloves, and ginger. </p>

        <a href="https://wa.me/+918141100044/?text=I%20want%20to%20order:%20'Masala'%20.%20%0A%0A<?= urlencode('Give me more details') ?>" class="text-center rounded-full w-full lg:w-[50%] px-5 py-3 bg-white hover:bg-zinc-300 transition-all duration-300 ease-in-out text-black font font-bold">Order Now</a>
      </div>
      <div class="w-full lg:w-[50%] h-full flex flex-col lg:flex-row items-center justify-center">
        <div class=" bg-[#733A44] rounded-lg shadow">
          <img src="./assets/img/products/masala.png" class="w-full lg:w-[500px] rounded-lg shadow-lg" alt="" />
        </div>
      </div>
    </div>
    <!-- // service  -->
    <div id="product" class="w-full bg-[#F6EEDF] text-black flex flex-col px-5 lg:px-[80px] gap-3 py-[60px]">
      <h1 class="text-[35px] text-center lg:text-start text-nowrap md:text-[55px] lg:text-[65px] font-bold leading-[1.2]">Explore Menu</h1>
      <div class="menu flex grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-between gap-11 text-[#F64B3C]">
        <?php
        $count = 1;
        foreach ($servicesJSON as $service) {
        ?>
          <div class="w-[100%] h-[400px] flex flex-col justify-center items-center px-3 py-2 gap-y-1 rounded-xl shadow-lg border-1 border-black hover:shadow-2xl transition-all duration-300 ease-in-out">

            <img src="<?= $service['image'] ?>" class="h-[70%] object-cover rounded-lg" alt="" />
            <h1 class="font-bold text-xl"><?= $service['title'] ?></h1>
            <!-- <p class="text-2xl font-bold text-[#F64B3C]">$<?= $service['price'] ?></p>
            <p class="text-sm mt-0 w-full h-[60px] overflow-hidden whitespace-pre-line truncate"><?= $service['details'] ?></p> -->
            <a href="./products.php?productId=<?= $service['id'] ?>" class="text-center mt-2 rounded-full w-full px-3 py-2 bg-[#F64B3C] hover:bg-red-600 transition-all duration-300 ease-in-out text-white font font-bold">Read More</a>
          </div>
        <?php
          if ($count >= 4) {
            break;
          } else {
            $count++;
          }
        }
        ?>

      </div>
    </div>
    <!-- Statics  -->
    <div class="w-full bg-[#F64B3C] flex flex-col px-5 lg:px-[80px] gap-3 justify-center items-center space-y-5 py-[60px]  lg:py-[120px]">
      <h1 class="text-[35px] text-center lg:text-start text-nowrap md:text-[55px] lg:text-[65px] font-bold leading-[1.2]">Statistics</h1>
      <p class="w-full md:w-[50%] text-center">Where quality meets convenience, serving millions of delightful moments worldwide.</p>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 flex justify-center items-center gap-3">
        <div class="w-[150px] md:w-[250px] h-[150px] md:h-[250px] flex justify-center items-center">
          <div class="box1 w-[150px] h-[150px] md:w-[230px] md:h-[230px] border-white border-[4px] flex flex-col justify-center items-center rounded-full">
            <h3 class="text-[50px] md:text-[75px] m-0 font-bold">7K+</h3>
            <p class="text-[20px] md:text-[30px] font-bold mt-[-25px]">CUSTOMER</p>
          </div>
        </div>
        <div class="w-[150px] md:w-[250px] h-[150px] md:h-[250px] flex justify-center items-center">
          <div class="box1 w-[150px] h-[150px] md:w-[230px] md:h-[230px] border-white border-[4px] flex flex-col justify-center items-center rounded-full">
            <h3 class="text-[50px] md:text-[75px] m-0 font-bold">20+</h3>
            <p class="text-[20px] md:text-[30px] font-bold mt-[-25px] text-center leading-[1.1] pt-2">BRAND's TRUST</p>
          </div>
        </div>
        <div class="w-[150px] md:w-[250px] h-[150px] md:h-[250px] flex justify-center items-center">
          <div class="box1 w-[150px] h-[150px] md:w-[230px] md:h-[230px] border-white border-[4px] flex flex-col justify-center items-center rounded-full">
            <h3 class="text-[50px] md:text-[75px] m-0 font-bold">15+</h3>
            <p class="text-[20px] md:text-[30px] font-bold mt-[-25px]">CITY</p>
          </div>
        </div>
        <div class="w-[150px] md:w-[250px] h-[150px] md:h-[250px] flex justify-center items-center">
          <div class="box1 w-[150px] h-[150px] md:w-[230px] md:h-[230px] border-white border-[4px] flex flex-col justify-center items-center rounded-full">
            <h3 class="text-[50px] md:text-[75px] m-0 font-bold">1k+ </h3>
            <p class="text-[17px] md:text-[25px] font-bold mt-[-25px] text-center leading-[1.1] pt-2">PINCODE DELIVERED</p>
          </div>
        </div>
      </div>
    </div>

    <!-- tea process  -->
    <div id="about" class="w-full bg-[#F6EEDF] py-5 px-5 lg:px-[80px] flex items-center py-[60px] lg:py-[120px]">
      <div class="bg-zinc-100 flex p-3 gap-3 flex flex-col lg:flex-row rounded-xl shadow hover:shadow-xl transition-all duration-300 ease-in-out">
        <div class="w-full lg:w-[50%] h-full flex flex-col lg:flex-row items-center justify-center">
          <img src="./assets/img/images/cafe.jpg" class="w-full rounded-xl" alt="tea-shop-photo" />
        </div>
        <div class="w-full lg:w-[50%] h-full text-black flex flex-col items-center justify-center md:px-11">
          <h1 class="text-[30px] lg:text-[70px] font-bold text-center lg:text-start">Tea Process</h1>
          <p class="font-[500] md:text-bold text-sm lg:text-md pb-5">

            We start with carefully selected tea leaves, harvested from renowned gardens. These leaves undergo a specialized extraction and drying process, capturing their rich essence and creating our premium instant tea premix.
          </p>
          <p class="font-[500] md:text-bold text-sm lg:text-md pb-5">
            The blend is rigorously tested for consistency and taste, then packaged and shipped worldwide. This ensures that tea enthusiasts everywhere can enjoy a convenient and delightful cup of Optimus Tea. </p>
        </div>
      </div>
    </div>
    <!-- // reviews  -->
    <div class="w-full bg-[#F6EEDF] py-8 px-5 lg:px-[80px] flex flex-col items-center gap-y-5">
      <div class="py-5">
        <p class="font-bold text-center text-sm lg:text-md text-[#F64B3C]">
          What Our
        </p>
        <h1 class="text-[27px] md:text-[40px] lg:text-[55px] font-bold text-center lg:text-start text-black">Customer Says</h1>
      </div>
      <div class="w-full lg:px-[80px] flex flex flex-col-reverse lg:flex-row items-center justify-between gap-3">
        <div class="w-full md:w-[430px] py-5 bg-white hover:bg-[red] text-black hover:text-white transition-all duration-500 ease-in-out shadow rounded-2xl shadow flex items-center px-5 flex gap-5">
          <img src="./assets/img/users/user-02.png" class="w-[100px] h-[100px] object-cover bg-white rounded-full" alt="">
          <div class="mgs relative">
            <div class="flex justify-between">
              <span class="text-[25px] font-bold">Rajesh Patel</span> <br>
            </div>
            <span class="text-sm"> Optimus Masala Chai brings the warmth of home in an instant. Perfect blend, rich flavor, and the convenience I need. Highly recommended!</span>
          </div>
        </div>
        <div class="w-full md:w-[430px] py-5 bg-white hover:bg-[red] text-black hover:text-white transition-all duration-500 ease-in-out shadow rounded-2xl shadow flex items-center px-5 flex gap-5">
          <img src="./assets/img/users/user-02.png" class="w-[100px] h-[100px] object-cover bg-white rounded-full" alt="">
          <div class="mgs relative">
            <div class="flex justify-between">
              <span class="text-[25px] font-bold">Priya Sharma</span> <br>
            </div>
            <span class="text-sm">Optimus Chai nails the authentic taste of homemade chai. Instant yet delicious. My daily go-to</span>
          </div>
        </div>
      </div>
      <div class="w-full lg:px-[80px] flex justify-center gap-3 mt-3">
        <div class="w-full md:w-[430px] py-5 bg-white hover:bg-[red] text-black hover:text-white transition-all duration-500 ease-in-out shadow rounded-2xl shadow flex items-center px-5 flex gap-5">
          <img src="./assets/img/users/user-02.png" class="w-[100px] h-[100px] object-cover bg-white rounded-full" alt="">
          <div class="mgs relative">
            <div class="flex justify-between">
              <span class="text-[25px] font-bold">Surbhi</span> <br>
            </div>
            <span class="text-sm">Optimus Chai is a game-changer. Authentic flavor, eco-friendly packaging. Can't start my day without it</span>
          </div>
        </div>
      </div>
    </div>

    <!-- // footer section  -->
    <footer id="contact" class="bg-black text-white px-5 lg:px-[80px] py-[60px]">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
          <div class="">
            <h3 class="text-xl font-bold mb-4">Optimus Tea</h3>
            <p class="text-gray-400 mb-4">F50, 50A, Pooja Estate, Opp. Raka Steel Traders GIDC, Vithal Udyognagar 388121, Gujrat, India <br>
              <a style="font-weight: 600;" href="mailto:connect@optimustea.com">Mail us : connect@optimustea.com</a>
            </p>
            <div class="flex space-x-4">
              <a href="https://www.instagram.com/vkfortea" target="_blank
              " class="text-white hover:text-gray-400">
                <i class="fab fa-instagram fa-lg"></i>
              </a>
              <a href="https://www.facebook.com/profile.php?id=100083080100924" target="_blank
              " class="text-white hover:text-gray-400">
                <i class="fab fa-facebook fa-lg"></i>
              </a>
              <a href="https://twitter.com/@connectoptimus" target="_blank
              " class="text-white hover:text-gray-400">
                <i class="fab fa-twitter fa-lg"></i>
              </a>
              <a href="https://wa.me/+918141100044/" target="_blank
              " class="text-white hover:text-gray-400">
                <i class="fab fa-whatsapp fa-lg"></i>
              </a>
            </div>
          </div>
          <div>
            <h3 class="text-xl font-bold mb-4">About</h3>
            <ul class="text-gray-400">
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">History</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Our Team</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Brand Guidelines</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Terms &amp; Condition</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Privacy Policy</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-xl font-bold mb-4">Services</h3>
            <ul class="text-gray-400">
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">How to Order</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Our Product</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Order Status</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Promo</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Payment Method</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-xl font-bold mb-4">Other</h3>
            <ul class="text-gray-400">
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Contact Us</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Help</a></li>
              <li class="mb-2"><a href="#" class="hover:text-white transition-all duration-300 ease-in-out">Privacy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

  </div>
</body>

</html>