const { createApp } = Vue

createApp({
  data() {
    return {
      headers: [],
      activeHeader: null,
      sidebarOpen: false,
    }
  },
  mounted() {
    this.extractHeaders()
    this.setupScrollSpy()
    this.setupMobileSidebar()
  },
  methods: {
    extractHeaders() {
      const content = document.querySelector('.container')
      const headerElements = content.querySelectorAll('h1, h2, h3, h4, h5, h6')

      this.headers = Array.from(headerElements).map((header, index) => {
        const id = header.id || `header-${index}`
        header.id = id

        return {
          id: id,
          text: header.textContent.trim(),
          level: parseInt(header.tagName.charAt(1)),
          element: header,
        }
      })
    },

    setupScrollSpy() {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              this.activeHeader = entry.target.id
            }
          })
        },
        {
          rootMargin: '-20% 0px -70% 0px',
        }
      )

      this.headers.forEach((header) => {
        observer.observe(header.element)
      })
    },

    scrollToHeader(headerId) {
      const element = document.getElementById(headerId)
      if (element) {
        element.scrollIntoView({
          behavior: 'smooth',
          block: 'start',
        })
      }

      // Close sidebar on mobile after clicking
      if (window.innerWidth <= 768) {
        this.sidebarOpen = false
      }
    },

    setupMobileSidebar() {
      // Close sidebar when clicking outside on mobile
      document.addEventListener('click', (e) => {
        if (window.innerWidth <= 768) {
          const sidebar = document.querySelector('.sidebar')
          const toggle = document.querySelector('.mobile-toggle')

          if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
            this.sidebarOpen = false
          }
        }
      })

      // Close sidebar on window resize
      window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
          this.sidebarOpen = false
        }
      })
    },

    toggleSidebar() {
      this.sidebarOpen = !this.sidebarOpen
    },
  },
}).mount('#app')
