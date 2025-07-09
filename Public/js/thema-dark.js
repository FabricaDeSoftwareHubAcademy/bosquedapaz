const linkElement = document.createElement('link');

linkElement.rel = 'stylesheet';
linkElement.type = 'text/css';
linkElement.href = '../../../Public/css/theme-dark.css'

document.head.appendChild(linkElement);

alert('oiiiiiiiiiii');

class ThemeManager {
  constructor() {
      this.themeToggle = document.getElementById('theme-toggle');
      this.themeIcon = document.querySelector('.theme-icon');
      this.currentTheme = this.getStoredTheme() || this.getSystemTheme();
      this.init();
  }

  init() {
      this.applyTheme(this.currentTheme);
      this.updateIcon(this.currentTheme);
      this.bindEvents();
  }

  getStoredTheme() {
      return localStorage.getItem('theme');
  }

  getSystemTheme() {
      if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          return 'dark';
      }
      return 'light';
  }

  applyTheme(theme) {
      if (theme === 'dark') {
          document.documentElement.setAttribute('data-theme', 'dark');
      } else {
          document.documentElement.removeAttribute('data-theme');
      }
      this.currentTheme = theme;
  }

  updateIcon(theme) {
      if (theme === 'dark') {
          this.themeIcon.textContent = '☀️';
          this.themeToggle.setAttribute('aria-label', 'Mudar para modo claro');
      } else {
          this.themeIcon.textContent = '🌙';
          this.themeToggle.setAttribute('aria-label', 'Mudar para modo escuro');
      }
  }

  toggleTheme() {
      const newTheme = this.currentTheme === 'dark' ? 'light' : 'dark';
      this.applyTheme(newTheme);
      this.updateIcon(newTheme);
      this.saveTheme(newTheme);
      this.animateToggleButton();
  }

  saveTheme(theme) {
      localStorage.setItem('theme', theme);
  }

  bindEvents() {
      this.themeToggle.addEventListener('click', () => {
          this.toggleTheme();
      });

      this.themeToggle.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              this.toggleTheme();
          }
      });

      if (window.matchMedia) {
          const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
          mediaQuery.addEventListener('change', (e) => {
              if (!this.getStoredTheme()) {
                  const systemTheme = e.matches ? 'dark' : 'light';
                  this.applyTheme(systemTheme);
                  this.updateIcon(systemTheme);
              }
          });
      }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const themeManager = new ThemeManager();
  window.themeManager = themeManager;
});