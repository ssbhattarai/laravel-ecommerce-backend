// $('.main-content .owl-carousel').owlCarousel({
    
//     loop: true,
//     margin: 20,
//     nav: true,
//     autoplay: true,
//     navText: [
//         '<i class="fa fa-angle-left" aria-hidden="true"></i>',
//         '<i class="fa fa-angle-right" aria-hidden="true"></i>'
//     ],
//     navContainer: '.main-content .custom-nav',
//     responsive:{
//         0:{
//             items: 1
//         },
//         600:{
//             items: 3
//         },
//         1000:{
//             items: 3
//         }
//     }
// });

// $('.owl-carousel').owlCarousel({
//     loop: true,
//         margin: 30,
//         dots:true,
//         autoplay: true,
        
       
//         responsive:{
//             0:{
//                 items: 1
//             },
//             600:{
//                 items: 3
//             },
//             1000:{
//                 items: 4
//             }
//         }
// })

$('.main-content .owl-carousel').owlCarousel({
    
    loop: true,
    margin: 20,
    nav: true,
    autoplay: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    navContainer: '.main-content .custom-nav',
    responsive:{
        0:{
            items: 1
        },
        600:{
            items: 3
        },
        1000:{
            items: 4
        }
    }
});