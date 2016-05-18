Feature: Hungry User adds Special Wish to the Dish
  In order to have my Dish customized
  As Hungry User
  I should be able to input Special Wish for my selected Dish

  Scenario: adding Special Wish to Order
    Given I am a Hungry User selecting his Dish in Order that is not Finished
    When I selected my Dish
    Then I should be able to input Special Wish for that Dish