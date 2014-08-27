var theseus = angular.module("theseus", ['ng', 'seo', 'ngDialog'])
// var theseus = angular.module("theseus", ['ng', 'seo'])
    
theseus.controller("HomeAdmin", function($scope) {
    $scope.helloTo = {};
    $scope.helloTo.title = "World,HHH AngularJS";
} );
   
theseus.controller("RegisterController", function($scope, ngDialog) {
    $scope.SendRegister = function() {
        $scope.connection_screen = false;
        ngDialog.closeAll();
    }
} );

theseus.controller("LoginController", function($scope, $rootScope, ngDialog) {
    $scope.checkLogin = function() {
        $rootScope.isLogged = false;
        $rootScope.username = "NONE";
    }
    $scope.Login = function() {
        $rootScope.displayAdminMenu = false;
        $rootScope.displayPowerMenu = false;
        $rootScope.displayUsersMenu = false;
        $rootScope.displayCustomersMenu = false;
        $rootScope.displayProductsMenu = false;
        $rootScope.displayEventsMenu = false;
        $rootScope.displayCategoriesMenu = false;
        $rootScope.displayOrdersMenu = false;
        $rootScope.displaySuppliersMenu = false;
        $rootScope.displayMakersMenu = false;
        $rootScope.displayAdmin = false;
        $rootScope.displayPower = false;
        $rootScope.displayUsers = false;
        $rootScope.displayCustomers = false;
        $rootScope.displayProducts = false;
        $rootScope.displayEvents = false;
        $rootScope.displayCategories = false;
        $rootScope.displayOrders = false;
        $rootScope.displaySuppliers = false;
        $rootScope.displayMakers = false;
        $rootScope.isLogged = true;
        if ($rootScope.isLogged) {
            $scope.connection = false;
            $scope.connection_screen = false;
            $rootScope.username = "toto";
            // $rootScope.roles = ['events', 'products', 'customers', 'power'];
            $rootScope.roles = ['events', 'customers'];
            // console.log(typeof roles['event']);
            if($rootScope.roles.indexOf('events') > -1) {
                // R customers
                // R products
                // RW events
                console.log('events');
                $rootScope.displayEventsMenu = true;
                $rootScope.displayAdminMenu = true;
            }
            if($rootScope.roles.indexOf('products') > -1 ) {
                // RW categories
                // RW products
                console.log('products');
                $rootScope.displayProductsMenu = true;
                $rootScope.displayAdminMenu = true;
            }
            if($rootScope.roles.indexOf('customers') > -1 ) {
                // RW ??? only power ???
                console.log('customers');
                $rootScope.displayCustomersMenu = true;
                $rootScope.displayAdminMenu = true;
            }
            if($rootScope.roles.indexOf('power') > -1) {
                // RW all
                console.log('power');
                $rootScope.displayAdminMenu = true;
                $rootScope.displayPowerMenu = true;
                $rootScope.displayUsersMenu = true;
                $rootScope.displayCustomersMenu = true;
                $rootScope.displayProductsMenu = true;
                $rootScope.displayEventsMenu = true;
                $rootScope.displayCategoriesMenu = true;
                $rootScope.displayOrdersMenu = true;
                $rootScope.displaySuppliersMenu = true;
                $rootScope.displayMakersMenu = true;
            }
            if($rootScope.displayAdminMenu ) {
                $rootScope.displayAdmin = true;
                $rootScope.displayPower = false;
                $rootScope.displayUsers = false;
                $rootScope.displayCustomers = false;
                $rootScope.displayProducts = false;
                $rootScope.displayEvents = false;
                $rootScope.displayCategories = false;
                $rootScope.displayOrders = false;
                $rootScope.displaySuppliers = false;
                $rootScope.displayMakers = false;
            }
            $scope.connection_screen = false;
        }
    }
    $rootScope.ToggleAdminMenus = function (item){
        console.log(item);
        $scope.HideAllAdminMenu();
        if (item === 'displayAdmin') {
            $rootScope.displayAdmin = true;
        }
        if (item === 'displayUsers') {
            $rootScope.displayUsers = true;
        }
        if (item === 'displayCustomers') {
            $rootScope.displayCustomers = true;
        }
        if (item === 'displayProducts') {
            $rootScope.displayProducts = true;
        }
        if (item === 'displayEvents') {
            $rootScope.displayEvents = true;
        }
        if (item === 'displayCategories') {
            $rootScope.displayCategories = true;
        }
        if (item === 'displayOrders') {
            $rootScope.displayOrders = true;
        }
        if (item === 'displaySuppliers') {
            $rootScope.displaySuppliers = true;
        }
        if (item === 'displayMakers') {
            $rootScope.displayMakers = true;
        }
    }
    $scope.HideAllAdminMenu = function() {
        $rootScope.displayAdmin = false;
        $rootScope.displayUsers = false;
        $rootScope.displayCustomers = false;
        $rootScope.displayProducts = false;
        $rootScope.displayEvents = false;
        $rootScope.displayCategories = false;
        $rootScope.displayOrders = false;
        $rootScope.displaySuppliers = false;
        $rootScope.displayMakers = false;
    }
    $scope.RemoveRoles = function() {
        $rootScope.role_events = false;
        $rootScope.role_products = false;
        $rootScope.role_customers = false;
        $rootScope.role_power = false;
        $rootScope.role_admin = false;
    }
    $scope.Logout = function() {
        $scope.connection_screen = false;
        $scope.isLogged = false;
        $scope.username = "NONE";
        document.location.href="/" 

    }
    $scope.Connection = function() {
        $scope.connection_screen = !$scope.connection_screen;
        $scope.registration = false;
    }
    $scope.Register = function() {
        $scope.connection_screen = false;
        $scope.registration = !$scope.registration;
        ngDialog.open({ 
            template: 'templates/register.html',
            controller: 'RegisterController',
        });
    }
    $scope.checkLogin();
} );

theseus.controller("BestSales", function($scope, ngDialog) {
    $scope.HidePrev = true;
    $scope.GetBestSales = function() {    
    $scope.scale = 10;
    $scope.hidden = 0;
    $scope.showStart = 0;
    $scope.showEnd = $scope.scale;
        $scope.best_sales = [];
        for (var i = 100 - 1; i >= 0; i--) {
            $scope.best_sales.push(
                {
                    'id': i,
                    'name': "telephone",
                    'ref': "1234567890",
                    'price': "10$",
                    'desc': "this is a telephone",
                    'img': "http://exmoorpet.com/wp-content/uploads/2012/08/cat.png",
                    'link': "http://toto.com",
                    "long_desc": "jhgjghjj dsfsdf sdf sf sf sf sf sdfsd fs fs fsd fsf sfsdf dsf sf sdsdfdsfsdfsfsdfs",
                }
            );
        };
        if($scope.best_sales.length > 10) {
            $scope.moreTen = true;

        }
        else {
            $scope.moreTen = false;
        }
    }
    $scope.ShowArticle = function(id) {
        console.log('article' + id);
        $scope.article = $scope.best_sales[id];
        console.log($scope.article);
        ngDialog.open({ 
            template: 'templates/article.html',
            scope: $scope,
        })
        
        ;    
    }
    $scope.hideTen = function() {
        $scope.hidden = 0;
        $scope.showStart = $scope.showStart-$scope.scale;
        $scope.showEnd = $scope.showEnd-$scope.scale;
        if($scope.showStart <= 1) {
            $scope.HidePrev = true;
        }
        else {
            $scope.HidePrev = false;
        }
        if($scope.showEnd  >= $scope.best_sales.length) {
            $scope.HideNext = true;
        }
        else {
            $scope.HideNext = false;
        }
    }
    $scope.showTen = function() {
        $scope.hidden = 0;
        $scope.showStart = $scope.showEnd;
        $scope.showEnd = $scope.showEnd+$scope.scale;
        if($scope.showStart + 1 <= 1) {
            $scope.HidePrev = true;
        }
        else {
            $scope.HidePrev = false;
        }
        if($scope.showEnd  >= $scope.best_sales.length) {
            $scope.HideNext = true;
        }
        else {
            $scope.HideNext = false;
        }
    }
    $scope.showAll = function() {
        $scope.hidden = 0;
        $scope.showStart =  0;
        $scope.showEnd = $scope.count;
    }
    $scope.GetBestSales();
} );

theseus.controller("NextEvents", function($scope, ngDialog) {
    $scope.GetNextEvents = function() {
    $scope.scale = 5;
    $scope.hidden = 0;
    $scope.showStart = 0;
    $scope.showEnd = $scope.scale;
        $scope.next_events = [];
        for (var i = 20 - 1; i >= 0; i--) {
            $scope.next_events.push(
                {
                    'id': i,
                    'date': "01/02/2015",
                    'place': "Bd Diderot  75012 Paris",
                    'disponible': "12",
                    'desc': "Many articles",
                    'img': "http://www.livemint.com/rf/Image-621x414/LiveMint/Period1/2012/09/06/Photos/Google%20ma--621x414.jpg",
                    'link': "http://toto.com",
                    "long_desc": "jhgjghjj dsfsdf sdf sf sf sf sf sdfsd fs fs fsd fsf sfsdf dsf sf sdsdfdsfsdfsfsdfs",
                }
            );
        };
        if($scope.next_events.length > 10) {
            $scope.moreTen = true;

        }
        else {
            $scope.moreTen = false;
        }
    }
    $scope.ShowEvent = function(id) {
        console.log('event' + id);
        $scope.event = $scope.next_events[id];
        console.log($scope.event);
        ngDialog.open({ 
            template: 'templates/event.html',
            scope: $scope,
        });        
    }
    $scope.hideTen = function() {
        $scope.hidden = 0;
        $scope.showStart = $scope.showStart-$scope.scale;
        $scope.showEnd = $scope.showEnd-$scope.scale;
        if($scope.showStart <= 1) {
            $scope.HidePrev = true;
        }
        else {
            $scope.HidePrev = false;
        }
        if($scope.showEnd  >= $scope.next_events.length) {
            $scope.HideNext = true;
        }
        else {
            $scope.HideNext = false;
        }
    }
    $scope.showTen = function() {
        $scope.hidden = 0;
        $scope.showStart = $scope.showEnd;
        $scope.showEnd = $scope.showEnd+$scope.scale;
        if($scope.showStart + 1 <= 1) {
            $scope.HidePrev = true;
        }
        else {
            $scope.HidePrev = false;
        }
        if($scope.showEnd  >= $scope.next_events.length) {
            $scope.HideNext = true;
        }
        else {
            $scope.HideNext = false;
        }
    }
    $scope.GetNextEvents();
} );


