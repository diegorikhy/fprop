angular.module "fullApp", [
  "ngTouch"
]

.controller "Full", [
  "$scope", "$rootScope", "$window", "$timeout"
  ($scope, $rootScope, $window, $timeout)->
    w = angular.element($window)
    $scope.vars =
      flatStyle: true
      isOnline: false
      contrate: false
      showLogin: false

    $scope.site =
      menu: [
        { nome: "Cases",        link: "#cases" ,      active: true}
        { nome: "Somos a Full", link: "#somos-full" , active: false}
        { nome: "Clientes",     link: "#clientes" ,   active: false}
        { nome: "Fullanos",     link: "#fullanos" ,   active: false}
        { nome: "Contatos",     link: "#contato" ,    active: false}
      ]

    $scope.activeMenu = ->
      $timeout($scope.slideRight, 300)


    limpaActiveMenu = ->
      item.active = false for item in $scope.site.menu

    w.scroll ->

      mnCases     = angular.element("#cases").offset().top
      mnSomosFull = angular.element("#somos-full").offset().top
      mnClientes  = angular.element("#clientes").offset().top
      mnFullans   = angular.element("#fullanos").offset().top
      mnContato   = angular.element("#contato").offset().top
      limpaActiveMenu()

      scrollTop = w.scrollTop() + 100
      if mnCases < scrollTop < mnSomosFull
        $scope.site.menu[0].active = true
      else if mnSomosFull < scrollTop < mnClientes
        $scope.site.menu[1].active = true
      else if mnClientes < scrollTop < mnFullans
        $scope.site.menu[2].active = true
      else if mnFullans < scrollTop < mnContato
        $scope.site.menu[3].active = true
      else if mnContato < scrollTop
        $scope.site.menu[4].active = true
      else
        $scope.site.menu[0].active = true
      $scope.$digest()


    isMobile = ->
      if w.width() < 992
        return true

    $scope.slideRight = ->
      $scope.slideToRight = !$scope.slideToRight
      if $scope.slideToRight && isMobile()
        $scope.slideClass = "slide-right"
        return $scope.slideToLeft = false
      else
        return $scope.slideClass = ""
]

.directive "floating", [
  ()->
    restrict: "C"
    link: (scope, $element)->
      elem = $element
      elemBox = $(".to-floating")
      elemTop = elem.offset().top
      elemHeight = elem[0].offsetHeight
      isFixed = false
      $w = $(window)
      return $w.scroll ->
        elem.css
          minHeight: elemHeight

        scrollTop = $w.scrollTop()
        shouldBeFixed = scrollTop > elemTop
        if shouldBeFixed and !isFixed
          elem.addClass "active"
          elemBox.css
            position: "fixed"
            top: 0
            zIndex: 300
            width: "100%"
          return isFixed = true
        else if (!shouldBeFixed && isFixed)
          elem.removeClass("active")
          elemBox.css
            position: "relative"
          return isFixed = false

    transclude: true
    replace: true
    template: "<div><div class=\"to-floating\" ng-transclude></div></div>"
]

.directive "scrollTo", ->
  restrict: "A"
  link: (scope, $elm, attrs) ->
    idToScroll = attrs.href
    marginTop = 35
    $elm.on "click", (e)->
      e.preventDefault()
      $target = undefined
      if idToScroll
        $target = $(idToScroll)
      else
        $target = $elm
      $("body").animate
        scrollTop: ($target.offset().top - marginTop)
      , "slow"
      return
    return
