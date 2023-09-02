<!DOCTYPE html>
<!-- This is the about us page
Displays a fake about us page-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo e(asset('css/stylesheet.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>About Us</title>
</head>
<body class="bodyBack">
<?php echo $__env->make('cookie-notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="banner"><p class="mainHeading">About Us</p>
    <div class="spacer"></div>
        <div class="custom-shape-divider-bottom-1693563954">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
    </svg></div></div>
    <div class="spacer"></div>
    <div class="termsBlock">
    <p class="aboutHeading">
            Cool Tech is a Blog News Website 
        </p>
        <p class="aboutHeading">
        About Cool Tech
        </p>
        <p class="aboutContent">
        Welcome to Cool Tech, your go-to source for the latest and greatest in the world of technology.
         We're more than just a tech blog; we're a community of tech enthusiasts, innovators, and dreamers. 
         Our mission is to keep you informed, inspired, and engaged with the ever-evolving tech landscape.
        </p>
        <p class="aboutHeading">
        Our Journey
        </p>
        <p class="aboutContent">
        Founded in [Year], Cool Tech has come a long way since its inception. 
        What started as a passion project by a group of tech aficionados has grown into a trusted resource for tech news, reviews, and insights. 
        Over the years, we've witnessed incredible advancements in technology, and we've been here to share the excitement with you.
        </p>
        <p class="aboutHeading">
        What We Do
        </p>
        <ul class="aboutContent">
            <li>Breaking News: Stay in the loop with real-time updates on the latest tech developments, product launches, and industry trends.</li>
            <li>In-Depth Reviews: We test, analyze, and review gadgets, software, and innovations to help you make informed decisions..</li>
            <li>How-Tos and Guides: From troubleshooting tech issues to mastering new skills, our step-by-step guides are here to assist you.</li>
            <!-- Add more terms here -->
        </ul>
    </div>
    
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
</body>
</html><?php /**PATH C:\Users\Gareth\OneDrive - Blue Falcon IT\Desktop\cool-tech\resources\views/about.blade.php ENDPATH**/ ?>