<?php
$servicesDb = "./panel/db/services.json";
$servicesData = file_get_contents($servicesDb);
$servicesJSON = json_decode($servicesData, true);

$getId = $_GET['productId'] ?? null;
$productData = null;

if ($getId !== null) {
    $filteredProducts = array_filter($servicesJSON, function ($product) use ($getId) {
        return $product['id'] == $getId;
    });

    if (!empty($filteredProducts)) {
        // Get the first item from the filtered array
        $productData = reset($filteredProducts);
    }
}
$howto = isset($_GET['howto']) ? $_GET['howto'] : 'false';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $productData['title'] ?? '' ?> | Your Cup of Tea - Optimus Tea</title>
    <meta name="description" content="<?= $productData['keywords'] ?? '' ?> , Your cup of tea' made easy. - Optimus Tea">
    <meta name="keywords" content="<?= $productData['keywords'] ?? '' ?>, optimus tea , your cup of tea ">

    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="./assets/js/tailwind.js"></script>
 
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./assets/js/script.js"></script>
</head>

<body>

    <div id="fullPage" class="hero h-screen text-white relative" style="background-image: white; background-size: cover;">
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
        <div class="nav bg-[#4e1d2696] text-black flex justify-between items-center px-5 lg:px-[80px] py-5 top-0 fixed w-full z-[99]" id="navbar">
            <div class="logo">
                <img src="./assets/logo/Source/Optimus_tea_Logo-01.png" class="w-[110px] rounded-md" alt="" />
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
        <!-- // pop up  -->

        <div id="popUp" class="hidden w-full h-full bg-transparent absolute bg-red-200 backdrop-blur-lg z-[999]">
            <div style="z-index: 999999;" class="p-3 relative w-[350px] rounded-lg bg-[#E6DDD4] fixed top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] transition-all duration-300 ease-in-out">
                <div class="w-[100%] h-[400px] flex flex-col justify-center items-center px-3 py-2 gap-y-1 rounded-xl shadow-xl">
                    <h1 class="font-bold text-xl text-[#F64B3C]">Cardamom</h1>
                    <img src="./assets/img/products/tea_cup.jpg" class="h-[50%] object-cover rounded-lg" alt="" />
                    <p class="text-lg text-black italic">Your cup of tea is ready !</p>
                    <!-- <p class="text-sm mt-0 w-full h-[60px] overflow-hidden whitespace-pre-line truncate">Your cup Of tea is ready</p> -->
                    <a href="https://wa.me/+918141100044/?text=I want to order Instant Tea Premix, <?= '%0A%0A' . urlencode("Give me more details") ?>" class="text-center mt-2 rounded-full w-full px-3 py-2 bg-[#F64B3C] hover:bg-red-600 transition-all duration-300 ease-in-out text-white font font-bold">Order Now</a>
                </div>
                <button onclick="xMark()" class="absolute transition-all duration-300 ease-in-out top-0 right-0 bg-red-400 hover:bg-red-500 px-5" style="border-radius: 0px 8px 0px 8px">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
        </div>
        <!-- / -->
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

        <!-- nav end  -->

        <div class="w-full pt-[120px] bg-[#F6EEDF] flex px-5 lg:px-[80px] gap-3 flex flex-col lg:flex-row py-[60px] gap-x-11">
            <div id="productImage" class="w-full lg:w-[40%] h-full flex flex-col lg:flex-row items-center justify-center rounded-lg shadow-xl">
                <img src="<?= $howto == 'true' ? $productData['image_2'] :  $productData['image'] ?>" class="w-full h-full object-cover rounded-lg shadow-lg" alt="" />
            </div>
            <div id="ProductDetails" class="flex-1 h-full text-black flex flex-col justify-center">
                <h1 class="text-[30px] lg:text-[70px] font-bold text-center lg:text-start"><?= $productData['title'] ?? 'N/A' ?></h1>
                <p class="font-[500] md:text-bold text-sm lg:text-lg pb-5 text-center lg:text-start">
                    <?= $productData['details'] ?? 'N/A' ?>
                </p>
                <div class="flex w-full gap-3">
                    <a href="./products.php?productId=<?= $productData['id'] ?>&howto=true" class="<?= $howto == 'true' ? 'hidden ' : ' ' ?> text-center rounded-full w-full lg:w-[50%] px-5 py-3 bg-[#F64B3C] hover:bg-red-600 transition-all duration-300 ease-in-out text-white font font-bold">How to use ?</a>
                    <a href="https://wa.me/+918141100044/?text=I want to order: <?= urlencode($productData['title']) . '%0A%0A' . urlencode("Give me more details about this product") ?>" class="w-full text-center rounded-full <?= $howto == 'true' ? '' : 'lg:w-[50%] ' ?> px-5 py-3 bg-[#F64B3C] hover:bg-red-600 transition-all duration-300 ease-in-out text-white font-bold">Order Now</a>
                </div>
            </div>
           
        </div>
        <!-- // footer section  -->
        <footer class="bg-black text-white px-5 lg:px-[80px] py-[60px]">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Optimus Tea</h3>
                        <p class="text-gray-400 mb-4">F50, 50A, Pooja Estate, Opp. Raka Steel Traders GIDC, Vithal Udyognagar 388121, Gujrat, India</p>
                        <div class="flex space-x-4">
                            <a href="https://www.instagram.com/vkfortea" target="_blank" class="text-white hover:text-gray-400">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                            <a href="https://www.facebook.com/profile.php?id=100083080100924" target="_blank" class="text-white hover:text-gray-400">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a href="https://twitter.com/@connectoptimus" target="_blank" class="text-white hover:text-gray-400">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a href="https://wa.me/+918141100044/" target="_blank" class="text-white hover:text-gray-400">
                                <i class="fab fa-whatsapp fa-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">About</h3>
                        <ul class="text-gray-400">
                            <li class="mb-2"><a href="#" class="hover:text-white">History</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Our Team</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Brand Guidelines</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Terms &amp; Condition</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Services</h3>
                        <ul class="text-gray-400">
                            <li class="mb-2"><a href="#" class="hover:text-white">How to Order</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Our Product</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Order Status</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Promo</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Payment Method</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Other</h3>
                        <ul class="text-gray-400">
                            <li class="mb-2"><a href="#" class="hover:text-white">Contact Us</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Help</a></li>
                            <li class="mb-2"><a href="#" class="hover:text-white">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>