let currentCardindex = 0;

function flipCard(button) {
    const card=button.closest('.project-card'); 
    // button.closest('.project-card'): This looks "up" the HTML tree from the button you clicked until it finds the parent div with the class .project-card. This ensures you only flip the specific card you are interacting with.
    card.classList.toggle('is-flipped');
    // card.classList.toggle('flipped'): This adds the flipped class to the card if it’s not there, or removes it if it is. The flipped class is what triggers the CSS to rotate the card and show the back side.

}

function nextCard() {
    const cards=document.querySelectorAll('.project-card');
        // querySelectorAll: This grabs every element with the class .project-card and puts them into a list (array).
    const CurrentCard=cards[currentCardindex];
        // cards[currentCardindex]: This gets the specific card from the list based on the currentCardindex variable, which starts at 0 (the first card).
    CurrentCard.classList.remove('active');
        // CurrentCard.classList.remove('active'): This removes the active class from the current card, which hides it from view.
        CurrentCard.classList.add('exit');
    // CurrentCard.classList.add('exit'): This adds an exit class to the current card, which can trigger a CSS animation for it to slide out or fade away.
    setTimeout(()=>{
        CurrentCard.classList.remove('is-flipped');
        // CurrentCard.classList.remove('is-flipped'): This ensures that when the card is shown again later, it will start in the unflipped state (showing the front side).
        //In JavaScript, setTimeout() is a built-in method used to execute a function or a block of code once after a specified delay in milliseconds
    },600);

    currentCardindex++;
    if(currentCardindex>=cards.length){
        currentCardindex=0;
        // This resets the index back to 0 when it reaches the end of the card list, allowing you to loop through the cards indefinitely.
        setTimeout(()=>{
            cards.forEach(card=>card.classList.remove('exit'));
            // This removes the exit class from all cards after a short delay, preparing them to be shown again when you loop back to the start.
        },500);
    }
    cards[currentCardindex].classList.add('active');
    // This adds the active class to the next card in the list, making it visible to the user.
}



 const navLinks=document.querySelectorAll('.nav-links a');
   const navToggle=document.querySelector('#nav-toggle');

    navLinks.forEach(link =>{     //close menu when a link is clicked
        link.addEventListener('click',() =>{
            navToggle.checked=false;
        });

    });

   // close menu when clicking outside of navigation

   document.addEventListener('click',(event) =>{
     const nav=document.querySelector('.nav');
    const isClickInsideNav=nav.contains(event.target);

     if(!isClickInsideNav && navToggle.checked){
        navToggle.checked=false;
     }

   });

   // set active link based on current page

    const currentPage=window.location.pathname.split('/').pop() || 'home.html'; // default to home.html if pathname is empty
   navLinks.forEach(link =>{
     if(link.getAttribute('href')===currentPage){
        link.classList.add('active');
     }
     else{
        link.classList.remove('active');
     }
   });


document.addEventListener('DOMContentLoaded', () => {
    const stats = document.querySelectorAll('.stat-number');
    
    const countOptions = {
        threshold: 0.3, // Trigger when 30% of the section is visible
        rootMargin: "0px 0px -50px 0px"
    };

    const statsObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log("Stats section visible - starting count!");
                const card = entry.target;
                const target = parseInt(card.getAttribute('data-target'));
                let count = 0;
                
                // Calculate speed: higher targets need faster increments
                const increment = target / 100; 
                
                const updateCount = () => {
                    if (count < target) {
                        count += increment;
                        card.innerText = Math.ceil(count);
                        setTimeout(updateCount, 20);
                    } else {
                        card.innerText = target;
                    }
                };
                
                updateCount();
                observer.unobserve(card); // Stop watching once animated
            }
        });
    }, countOptions);

    stats.forEach(stat => statsObserver.observe(stat));
});


