document.addEventListener('DOMContentLoaded', function() {
    const accordionItems = document.querySelectorAll('.accordion-item');
  
    accordionItems.forEach(item => {
      const accordionTitle = item.querySelector('.accordion-title');
      accordionTitle.addEventListener('click', function() {
        toggleAccordion(this);
      });
    });
  
    const applyButton = document.getElementById('applyButton');
    applyButton.addEventListener('click', function() {
      showAccordions();
    });
  });
  
  function toggleAccordion(titleElement) {
    const contentElement = titleElement.nextElementSibling;
    const icon = titleElement.querySelector('i');
  
    if (contentElement.style.display === 'none' || contentElement.style.display === '') {
      closeAllAccordions(); // Moved this line here to close all before opening clicked accordion
      contentElement.style.display = 'block';
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-up');
    } else {
      contentElement.style.display = 'none';
      icon.classList.remove('fa-chevron-up');
      icon.classList.add('fa-chevron-down');
    }
  }
  
  function closeAllAccordions() {
    const accordionContents = document.querySelectorAll('.accordion-content');
    const accordionIcons = document.querySelectorAll('.accordion-icon');
  
    accordionContents.forEach(content => {
      content.style.display = 'none';
    });
  
    accordionIcons.forEach(icon => {
      const iconElement = icon.querySelector('i');
      iconElement.classList.remove('fa-chevron-up');
      iconElement.classList.add('fa-chevron-down');
    });
  }

//


const menuItems = document.querySelectorAll('.ef-button');
const tabContents = document.querySelectorAll('#tabs-content-main .influencers-product-card');
const tabsContentMain = document.getElementById('tabs-content-main');

menuItems.forEach((menuItem) => {
    menuItem.addEventListener('click', () => {
        // Remove the 'active' class from all tab contents
        tabContents.forEach((tabContent) => {
            tabContent.classList.remove('active');
        });

        // Get the data-content attribute from the clicked menu item
        const contentClasses = menuItem.getAttribute('data-content').split(' ');

        // Add the 'active' class to the related tab content
        contentClasses.forEach((contentClass) => {
            document.querySelectorAll(`.${contentClass}`).forEach((relatedTabContent) => {
                relatedTabContent.classList.add('active');
            });
        });

        // Add a class to the main content
        tabsContentMain.classList.add('active-container');
    });
});


jQuery(".accordion-open-mobile").click(function(){
    jQuery("#tabs-content-main").removeClass("active-container");
});


