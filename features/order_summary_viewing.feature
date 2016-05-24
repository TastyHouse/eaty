Feature: Hungry User views the Summary
  In order to know what mine and other Hungry Users Dish was
  As Hungry User
  When Order is Finished Order
  I should be able to view the Summary

  Scenario: Viewing the summary as Hungry User
    Given Order is Finished
    When Hungry User visits Order page via Order link
    Then he should see the order Summary
    And be able to view what the costs were for each Hungry user ordering