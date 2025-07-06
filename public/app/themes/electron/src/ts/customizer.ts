/**
 * Customizer functionality for the Electron theme
 * Handles live preview updates in the WordPress Customizer
 */

interface CustomizerConfig {
  blogname: string;
  blogdescription: string;
  headerTextcolor: string;
}

class Customizer {
  private config: CustomizerConfig;

  constructor() {
    this.config = {
      blogname: '',
      blogdescription: '',
      headerTextcolor: ''
    };

    this.init();
  }

  private init(): void {
    // Site title
    this.setupCustomizer('blogname', (value: string) => {
      const siteTitle = document.querySelector('.site-title a');
      if (siteTitle) {
        siteTitle.textContent = value;
      }
    });

    // Site description
    this.setupCustomizer('blogdescription', (value: string) => {
      const siteDescription = document.querySelector('.site-description');
      if (siteDescription) {
        siteDescription.textContent = value;
      }
    });

    // Header text color
    this.setupCustomizer('header_textcolor', (value: string) => {
      this.updateHeaderTextColor(value);
    });
  }

  private setupCustomizer(setting: string, callback: (value: string) => void): void {
    // This would be handled by WordPress Customizer API
    // For now, we'll create a mock implementation
    if (typeof (window as any).wp !== 'undefined' && (window as any).wp.customize) {
      (window as any).wp.customize(setting, (customizer: any) => {
        customizer.bind(callback);
      });
    }
  }

  private updateHeaderTextColor(color: string): void {
    const siteTitle = document.querySelector('.site-title a') as HTMLElement;
    const siteDescription = document.querySelector('.site-description') as HTMLElement;

    if (color === 'blank') {
      // Hide header text
      if (siteTitle) {
        siteTitle.style.clip = 'rect(1px, 1px, 1px, 1px)';
        siteTitle.style.position = 'absolute';
      }
      if (siteDescription) {
        siteDescription.style.clip = 'rect(1px, 1px, 1px, 1px)';
        siteDescription.style.position = 'absolute';
      }
    } else {
      // Show header text with specified color
      if (siteTitle) {
        siteTitle.style.clip = 'auto';
        siteTitle.style.position = 'relative';
        siteTitle.style.color = color;
      }
      if (siteDescription) {
        siteDescription.style.clip = 'auto';
        siteDescription.style.position = 'relative';
        siteDescription.style.color = color;
      }
    }
  }
}

// Initialize customizer when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  new Customizer();
});

export default Customizer; 
