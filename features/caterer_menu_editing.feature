Feature: Administrator edits the Caterer menu
  In order to edit a Caterers Menu
  As Administrator
  I should be able to change Menu type and available Dishes

  Scenario: Administrator adds new Dish to Internal Menu
    Given selected Caterer has Internal Menu
    When I provide dish data (ingredients) and price
    And data I provided is valid
    Then I should have that Dish added and available for that Caterer

  Scenario: Administrator edits existing Dish in Internal Menu
    Given selected Caterer has Internal Menu
    When I try to edit existing Dish in that Menu
    And data I edited is valid
    Then I should have that Dish edited and edited data should be visible for future Orders
    And previous Orders shouldn't change

  Scenario: Administrator changes existing Caterer Menu type
    Given selected Caterer menu should be changed
    When I select new Menu type
    Then I should be able to provide new Menu data for that type

