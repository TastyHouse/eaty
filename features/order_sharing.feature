Feature: Order Keeper sharing the Order
  In order to have other Hungry Users order Dishes with me
  As Order Keeper
  I should be able to share link to Order

  Scenario: Order link retrieving
    Given Order Keeper has Order that is Unfinished
    When he clicks "Get share link"
    Then he should be able to copy Order link and share it