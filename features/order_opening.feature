Feature: Hungry User creates the Order
  In order to have a Dish
  As Hungry User
  I should be able to select Caterer and Dish

  Scenario: Order creation by Hungry User
    Given there are Caterers available
    When Hungry User clicks "Create new Order" button
    Then he should be able to select Caterer
    And he should become Order Keeper