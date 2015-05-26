<?php

namespace AppBundle;

final class myCatsEvents
{
  /**
   * The NEW_CAT_CREATED event occurs when a new cat is created
   * This event send an email to the admin as notification
   */
  const NEW_CAT_CREATED = "new.cat_created";

}
