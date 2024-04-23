@include('navbar')
<style>
.hs{
    font-family: "Brush Script MT", cursive;
    text-shadow: 2px 2px 4px #f19800;
} 

</style>
<header class="section-title">
    <h2 class="hs">Our Services</h2>
</header>
<section class="services">
    <div class="service-card">
        <img src="{{ asset('img/checkhands.png') }}" alt="">
        <h3>Trustworthy Solutions</h3>
        <p>Our commitment to quality and reliability ensures that you can trust us to deliver exceptional web development solutions tailored to your needs.</p>
    </div>
    <div class="service-card">
        <img src="{{ asset('img/livraisondegh.png') }}" alt="">
        <h3>On-Time Delivery</h3>
        <p>We understand the importance of timely delivery. With our mobile app development services, expect prompt and efficient delivery across iOS and Android platforms.</p>
    </div>
    <div class="service-card">
        <img src="{{ asset('img/gift.png') }}" alt="">
        <h3>Special Offers & Gifts</h3>
        <p>Unlock exciting opportunities with our digital marketing services. Benefit from special offers and gifts as we help you grow your online presence and reach your target audience.</p>
    </div>
    
</section>

<section class="video-presentation">
    <div class="container_vedio">
        <h2 class="hs">Explore Our Website</h2>
        <div class="video-wrapper">
            <video controls width="560" height="315" loop>
                <source src="{{ asset('img/BookPromotionalVideoTemplate.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</section>

<section class="company-timeline">
    <div class="timeline">
        <h2 class="hs">Time-Line</h2>
        <div class="timeline-item">
            <div class="timeline-content">
                <h3 class="hs">Year 1</h3>
                <p>Company founded: Our journey began in 2014 when Soulaiman & Soumaia LAMIN established LIBE-UP with the vision of revolutionizing the way people access and enjoy books. Our mission was clear: to provide book lovers with a seamless platform to discover, purchase, and reserve their favorite titles.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-content">
                <h3 class="hs">Year 2</h3>
                <p>Launched first product: In 2015, we proudly introduced our inaugural product, the LIBE-UP online bookstore. This innovative platform offered book enthusiasts a diverse selection of titles, easy browsing, and secure purchasing options, all in one convenient location. With our first product, we set the stage for transforming the way people buy and reserve books online.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-content">
                <h3 class="hs">Year 3</h3>
                <p>Achieved significant milestone: such as securing a key partnership or reaching . These accomplishments solidified our position as  and propelled us toward even greater achievements in the years ahead.</p>
            </div>
        </div>
        
    </div>
</section>

<section class="testimonials">
    <h2 class="hs">Testimonial</h2>
    <div class="testimonial-slider">
        <div class="testimonial">
            <p>"I've been consistently impressed by the vast collection and excellent resources available at this library. The staff is incredibly helpful and knowledgeable, making every visit a pleasure."</p>
            <p class="author">- Emily Brown</p>
        </div>
        <div class="testimonial">
            <p>"The library's commitment to providing access to diverse literature and educational materials is truly commendable. It has become my go-to place for research and learning."</p>
            <p class="author">- Michael Johnson</p>
        </div>
        <div class="testimonial">
            <p>"I can't thank the library enough for its fantastic services. From well-organized events to comprehensive online resources, it's clear that they prioritize the needs of their patrons."</p>
            <p class="author">- Samantha Miller</p>
        </div>
        <div class="testimonial">
            <p>"The library has exceeded my expectations in every way. Its welcoming atmosphere and top-notch amenities make it a hub for intellectual exploration and community engagement."</p>
            <p class="author">- Christopher Lee</p>
        </div>
            </div>
    <button class="prev-btn">&#10094;</button>
    <button class="next-btn">&#10095;</button>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const testimonialsContainer = document.querySelector('.testimonial-slider');
    const prevButton = document.querySelector('.prev-btn');
    const nextButton = document.querySelector('.next-btn');

    let testimonialIndex = 0;

    function showTestimonial(index) {
        const testimonials = document.querySelectorAll('.testimonial');
        testimonials.forEach(testimonial => testimonial.style.display = 'none');
        testimonials[index].style.display = 'block';
    }

    function nextTestimonial() {
        testimonialIndex++;
        if (testimonialIndex >= testimonialsContainer.children.length) {
            testimonialIndex = 0;
        }
        showTestimonial(testimonialIndex);
    }

    function prevTestimonial() {
        testimonialIndex--;
        if (testimonialIndex < 0) {
            testimonialIndex = testimonialsContainer.children.length - 1;
        }
        showTestimonial(testimonialIndex);
    }

    nextButton.addEventListener('click', nextTestimonial);
    prevButton.addEventListener('click', prevTestimonial);

    showTestimonial(testimonialIndex);
});

</script>
@include('footer')
