Feature: Hungry User joins the Order
  In order to have a Dish
  As Hungry User
  I should be able to join existing and not yet finished Order and select a Dish

  Scenario: Joining the active Order
    Given Hungry User has link to active Order
    When he enters link to Order
    Then he should be able to select his Dish

  Scenario: Joining the Finished Order
    Given Hungry User has link to Finished Order
    When he enters link to Order
    Then he should see Order is Finished
    And not be able to select Dish