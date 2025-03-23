(function ($) {
  const SUB_MENU_CLS = "button.wp-block-navigation-submenu__toggle";
  const SUB_CONTAINER_CLS = "ul.wp-block-navigation-submenu";
  const ALARIUS_CLASS_NAME = "alarius-submenu";

  document.addEventListener("DOMContentLoaded", () => {
    prepareSubMenu();
    prepareMobileMenu();
  });

  function prepareSubMenu() {
    const subMenus = document.querySelectorAll(SUB_MENU_CLS);
    subMenus.forEach((submenu) => {
      const childSpan = submenu.firstElementChild;
      childSpan.classList.add("opener");
      childSpan.classList.add(ALARIUS_CLASS_NAME);
      const parent = submenu.parentElement;
      parent.replaceChild(childSpan, submenu);
      parent.removeChild(parent.querySelector(".wp-block-navigation__submenu-icon"));
      childSpan.addEventListener("click", (e) => opener(e));
    });

    const subMenuContainers = document.querySelectorAll(SUB_CONTAINER_CLS);
    subMenuContainers.forEach((container) => container.classList.remove("wp-block-navigation__submenu-container"));
  }

  /**
   * Toggle class active on span.
   * This changes the sibling ul display property (none -> block).
   */
  function opener(event) {
    event.preventDefault();

    const target = event.target;
    target.classList.toggle("active");
  }

  function prepareMobileMenu() {
    const mobMenu = document.querySelector(".wp-block-navigation__responsive-container-open");
    mobMenu?.parentElement.removeChild(mobMenu);
  }
})(jQuery);
