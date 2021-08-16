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
    $(e.currentTarget).animate(
      { left: "2rem", opacity: 1 },
      { easing: "swing" }
    );
  });

  $(window)
    .on("load", () => {
      navigation.onloadMobileSubMenu();
      navigation.onloadDesktopSubCategories();
    })
    .on("resize", () => {
      navigation.onloadDesktopSubCategories();
      navigation.onloadMobileSubMenu();
      navigation.asideNav.css({ left: "0%" });
    });
});
