$(() => {
  class Navigation {
    constructor() {
      this.toggleSideMenu = false;
      this.toggleMobileSubMenu = false;
      this.toggleDesktopSubCategories = false;
      this.heightMobileSubMenu = 0;
      this.heightDesktopSubCategories = 0;
      this.asideNavContainer = $("#asideNavContainer");
      this.asideNav = $("#asideNav");
      this.asideNavBackdrop = $("#asideNavBackdrop");
      this.activeMobileSubMenu = $("#activeMobileSubMenu");
      this.mobileSubMenu = $("#mobileSubMenu");
      this.activeMobileSubMenuContainer = $("#activeMobileSubMenuContainer");
      this.subMenuListContainer = $("#subMenuListContainer");

      this.categoriesBtn = $("#categoriesBtn");
      this.desktopSubCategories = $("#desktopSubCategories");

      this.modeToggle = $("#modeToggle");
      this.mode = "light";
    }

    checkTheme = () => {
      if (JSON.parse(localStorage.getItem("theme")) === true) {
        this.modeToggle.find("button").animate(
          { left: "1.375rem" },
          {
            duration: 200,
            easing: "swing",
            done: () => {
              this.mode = "dark";
              $("html").addClass("dark");
              this.modeToggle
                .find("button")
                .html(
                  `<svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -1.5 24 24" width="15" height="15" preserveAspectRatio="xMinYMin" class="icon__icon ml-1.5 fill-current text-neutralLight"><path d="M10 15.565a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-15a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zm0 16a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zm-9-7h2a1 1 0 1 1 0 2H1a1 1 0 0 1 0-2zm16 0h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm.071-6.071a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM5.757 14.808a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM4.343 3.494l1.414 1.414a1 1 0 0 1-1.414 1.414L2.93 4.908a1 1 0 0 1 1.414-1.414zm11.314 11.314l1.414 1.414a1 1 0 0 1-1.414 1.414l-1.414-1.414a1 1 0 1 1 1.414-1.414z"></path></svg>`
                );
            },
          }
        );
      }
    };

    setTheme = () => {
      if (localStorage.getItem("theme") === null) {
        localStorage.setItem("theme", true);
      } else {
        const theme = JSON.parse(localStorage.getItem("theme"));

        localStorage.setItem("theme", !theme);
      }
    };

    toggleSubCategories = (toggle) => {
      this.toggleDesktopSubCategories = toggle;
      this.desktopSubCategories.find("ul").animate(
        {
          opacity: toggle ? 1 : 0,
        },
        { easing: "swing" }
      );
      this.desktopSubCategories.animate(
        {
          height: toggle ? this.heightDesktopSubCategories : 0,
        },
        { easing: "swing" }
      );
    };

    toggleAsideMenu = (toggle) => {
      this.toggleSideMenu = toggle;
      if (toggle === true) {
        this.asideNavContainer.removeClass("hidden");
      }
      this.asideNavBackdrop.animate(
        { opacity: toggle ? 0.6 : 0 },
        {
          easing: "swing",
        }
      );
      this.asideNav.animate(
        { left: toggle ? "0%" : "-100%" },
        {
          easing: "swing",
          done: () => {
            if (toggle === false) {
              this.asideNavContainer.addClass("hidden");
            }
          },
        }
      );
    };

    toggleDropSubMenu = (toggle, height) => {
      this.toggleMobileSubMenu = toggle;
      this.subMenuListContainer.animate(
        { opacity: toggle ? 1 : 0 },
        { easing: "swing" }
      );
      this.mobileSubMenu.animate({ height: height }, { easing: "swing" });
    };

    onloadMobileSubMenu = () => {
      this.heightMobileSubMenu =
        this.activeMobileSubMenuContainer.innerHeight() +
        this.subMenuListContainer.innerHeight() +
        4;
      this.mobileSubMenu.height(
        this.activeMobileSubMenuContainer.innerHeight()
      );
    };

    onloadDesktopSubCategories = () => {
      this.heightDesktopSubCategories = this.desktopSubCategories
        .find("ul")
        .innerHeight();
      this.desktopSubCategories.innerHeight(0);
    };
  }

  const navigation = new Navigation();

  $("#menuBurg").on("click", () => {
    navigation.toggleAsideMenu(!navigation.toggleSideMenu);
  });

  navigation.asideNavBackdrop.on("click", () =>
    navigation.toggleAsideMenu(!navigation.toggleSideMenu)
  );

  navigation.activeMobileSubMenuContainer.on("click", () => {
    navigation.toggleDropSubMenu(
      !navigation.toggleMobileSubMenu,
      navigation.toggleMobileSubMenu === false
        ? navigation.heightMobileSubMenu
        : navigation.activeMobileSubMenuContainer.innerHeight()
    );
  });

  navigation.categoriesBtn.on("click", () => {
    navigation.toggleSubCategories(!navigation.toggleDesktopSubCategories);
  });

  navigation.modeToggle.on("click", (e) => {
    const button = $(e.currentTarget).find("button");

    button.animate(
      { left: navigation.mode === "light" ? "1.375rem" : "0.125rem" },
      {
        duration: 200,
        easing: "swing",
        done: function () {
          if (navigation.mode === "light") {
            navigation.mode = "dark";
            $("html").addClass("dark");
            $(this).html(
              `<svg xmlns="http://www.w3.org/2000/svg" viewBox="-2 -1.5 24 24" width="15" height="15" preserveAspectRatio="xMinYMin" class="icon__icon ml-1.5 fill-current text-neutralLight"><path d="M10 15.565a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-15a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zm0 16a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zm-9-7h2a1 1 0 1 1 0 2H1a1 1 0 0 1 0-2zm16 0h2a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2zm.071-6.071a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM5.757 14.808a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 1 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM4.343 3.494l1.414 1.414a1 1 0 0 1-1.414 1.414L2.93 4.908a1 1 0 0 1 1.414-1.414zm11.314 11.314l1.414 1.414a1 1 0 0 1-1.414 1.414l-1.414-1.414a1 1 0 1 1 1.414-1.414z"></path></svg>`
            );
            navigation.setTheme();
          } else {
            navigation.mode = "light";
            $("html").removeClass("dark");
            $(this).html(
              `<svg xmlns="http://www.w3.org/2000/svg" viewBox="-4 -2 24 24" width="15" height="15" preserveAspectRatio="xMinYMin" class="icon__icon ml-1 fill-current text-textColor1"><path d="M12.253.335A10.086 10.086 0 0 0 8.768 8c0 4.632 3.068 8.528 7.232 9.665A9.555 9.555 0 0 1 9.742 20C4.362 20 0 15.523 0 10S4.362 0 9.742 0c.868 0 1.71.117 2.511.335z"></path></svg>`
            );
            navigation.setTheme();
          }
        },
      }
    );
  });

  $(window)
    .on("load", () => {
      navigation.onloadMobileSubMenu();
      navigation.onloadDesktopSubCategories();
      navigation.checkTheme();
    })
    .on("resize", () => {
      navigation.onloadDesktopSubCategories();
      navigation.onloadMobileSubMenu();
      navigation.asideNav.css({ left: "0%" });
    });
});
