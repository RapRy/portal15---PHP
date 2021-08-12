$(() => {
  class Navigation {
    constructor() {
      this.toggleSideMenu = false;
      this.toggleMobileSubMenu = false;
      this.heightMobileSubMenu = 0;
      this.asideNavContainer = $("#asideNavContainer");
      this.asideNav = $("#asideNav");
      this.asideNavBackdrop = $("#asideNavBackdrop");
      this.activeMobileSubMenu = $("#activeMobileSubMenu");
      this.mobileSubMenu = $("#mobileSubMenu");
      this.activeMobileSubMenuContainer = $("#activeMobileSubMenuContainer");
      this.subMenuListContainer = $("#subMenuListContainer");
    }

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
      console.log(this.asideNav);
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
      this.heightMobileSubMenu = $("#mobileSubMenu").innerHeight();
      this.mobileSubMenu.height(
        this.activeMobileSubMenuContainer.innerHeight()
      );
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

  $(window).on("load", () => navigation.onloadMobileSubMenu());
});
