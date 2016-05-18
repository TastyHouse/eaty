Feature: Order Keeper finishes the Order
  In order to stop Hungry Users joining the Order or changing their Dishes
  As Order Keeper
  I should be able to finish the Order, making it Finished Order

  Scenario: Finishing the Order by Order Keeper
    Given Order Keeper selected his Dish
    When he clicks button which finishes the Order
    Then Order should be made Finished and no Hungry User could select/change his Dish