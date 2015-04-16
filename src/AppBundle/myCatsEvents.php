<?php

namespace AppBundle;

final class myCatsEvents
{
  /**
   * The NEW_CAT_CREATED event occurs when a new cat is created
   * This event send an email to the admin as notification
   */
  const NEW_CAT_CREATED = "new.cat_created";

  /**
   * The CONTACT_SEND event occurs when a contact form is created
   * This event send an email to the admin whit the contact form dates
   */
  const CONTACT_SEND = "contact_send";
}
