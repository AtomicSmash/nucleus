/**
 * Navigation functionality for the Electron theme
 * Handles mobile menu toggling and keyboard navigation
 */

interface NavigationConfig {
  siteNavigation: HTMLElement | null;
  button: HTMLButtonElement | null;
  menu: HTMLUListElement | null;
}

class Navigation {
  private config: NavigationConfig;

  constructor() {
    this.config = {
      siteNavigation: document.getElementById('site-navigation'),
      button: null,
      menu: null
    };

    this.init();
  }

  private init(): void {
    if (!this.config.siteNavigation) {
      return;
    }

    this.config.button = this.config.siteNavigation.getElementsByTagName('button')[0] || null;
    this.config.menu = this.config.siteNavigation.getElementsByTagName('ul')[0] || null;

    if (!this.config.button) {
      return;
    }

    if (!this.config.menu) {
      this.config.button.style.display = 'none';
      return;
    }

    if (!this.config.menu.classList.contains('nav-menu')) {
      this.config.menu.classList.add('nav-menu');
    }

    this.bindEvents();
  }

  private bindEvents(): void {
    if (!this.config.button || !this.config.siteNavigation) {
      return;
    }

    // Toggle menu on button click
    this.config.button.addEventListener('click', () => {
      this.toggleMenu();
    });

    // Close menu when clicking outside
    document.addEventListener('click', (event: Event) => {
      const target = event.target as HTMLElement;
      const isClickInside = this.config.siteNavigation?.contains(target);

      if (!isClickInside) {
        this.closeMenu();
      }
    });

    // Handle keyboard navigation
    this.setupKeyboardNavigation();
  }

  private toggleMenu(): void {
    if (!this.config.siteNavigation || !this.config.button) {
      return;
    }

    this.config.siteNavigation.classList.toggle('toggled');

    const isExpanded = this.config.button.getAttribute('aria-expanded') === 'true';
    this.config.button.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
  }

  private closeMenu(): void {
    if (!this.config.siteNavigation || !this.config.button) {
      return;
    }

    this.config.siteNavigation.classList.remove('toggled');
    this.config.button.setAttribute('aria-expanded', 'false');
  }

  private setupKeyboardNavigation(): void {
    if (!this.config.menu) {
      return;
    }

    const links = this.config.menu.getElementsByTagName('a');
    const linksWithChildren = this.config.menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    // Add focus/blur handlers for keyboard navigation
    Array.from(links).forEach(link => {
      link.addEventListener('focus', this.toggleFocus.bind(this), true);
      link.addEventListener('blur', this.toggleFocus.bind(this), true);
    });

    // Add touch handlers for mobile
    Array.from(linksWithChildren).forEach(link => {
      link.addEventListener('touchstart', this.toggleFocus.bind(this), false);
    });
  }

  private toggleFocus(event: Event): void {
    const target = event.target as HTMLElement;

    if (event.type === 'focus' || event.type === 'blur') {
      let element: HTMLElement | null = target;
      
      // Move up through ancestors until we hit .nav-menu
      while (element && !element.classList.contains('nav-menu')) {
        if (element.tagName.toLowerCase() === 'li') {
          element.classList.toggle('focus');
        }
        element = element.parentElement;
      }
    }

    if (event.type === 'touchstart') {
      const menuItem = target.parentElement;
      if (!menuItem) return;

      event.preventDefault();
      
      const siblings = menuItem.parentElement?.children;
      if (siblings) {
        Array.from(siblings).forEach(sibling => {
          if (sibling !== menuItem) {
            sibling.classList.remove('focus');
          }
        });
      }
      
      menuItem.classList.toggle('focus');
    }
  }
}

// Initialize navigation when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new Navigation();
});

export default Navigation; 
