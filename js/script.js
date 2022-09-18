const navItems = document.querySelector('.nav_items');
const openNavBtn = document.querySelector('#open_nav-btn');
const closeNavBtn = document.querySelector('#close_nav-btn');


// open nav menu drop down
const openNav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}
// close nav menu drop down
const closeNav = () => {
    navItems.style.display = 'none';
    closeNavBtn.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
}
openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);


// == ASIDE 
const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show_sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide_sidebar-btn');

// show side bar
const showSidebar = () => {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'inline-block';
}

// hide side bar
const hideSidebar = () => {
    sidebar.style.left = '-100%';
    hideSidebarBtn.style.display = 'none';
    showSidebarBtn.style.display = 'inline-block';
}

hideSidebarBtn.addEventListener('click', hideSidebar);
showSidebarBtn.addEventListener('click', showSidebar);