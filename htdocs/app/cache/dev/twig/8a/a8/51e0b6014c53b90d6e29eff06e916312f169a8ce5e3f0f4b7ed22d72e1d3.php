<?php

/* AppBundle:account:login.html.twig */
class __TwigTemplate_8aa851e0b6014c53b90d6e29eff06e916312f169a8ce5e3f0f4b7ed22d72e1d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::frontend.html.twig", "AppBundle:account:login.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'article' => array($this, 'block_article'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "  ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.title", array(), "messages"), "html", null, true);
        echo "
";
    }

    // line 6
    public function block_article($context, array $blocks = array())
    {
        // line 7
        echo "
  ";
        // line 8
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 9
            echo "    <div>
      ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 13
        echo "  <div id=\"conta\">
    <div id=\"loginBox\">
      <form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("user_login_check");
        echo "\" method=\"post\">
        <label for=\"username\">";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.email", array(), "forms"), "html", null, true);
        echo ":</label></br>
        <input type=\"text\" name=\"_username\" id=\"username\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, ((array_key_exists("last_username", $context)) ? (_twig_default_filter((isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "")) : ("")), "html", null, true);
        echo "\" /></p>
        <label for=\"password\">";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.password", array(), "forms"), "html", null, true);
        echo ":</label>
        <input type=\"password\" name=\"_password\" id=\"password\" /></p>
        <input type=\"checkbox\" name=\"_remember_me\" id=\"remember\" />
        <label for=\"remember\">";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.dontClose", array(), "forms"), "html", null, true);
        echo "</label></br>
        <input type=\"submit\" name=\"login\" value=";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.submit", array(), "forms"), "html", null, true);
        echo " /></p>
      </form>
    <div id=\"register\">
      <a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("register");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("login.signUp", array(), "forms"), "html", null, true);
        echo "</a>
    </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:account:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 25,  82 => 22,  78 => 21,  72 => 18,  68 => 17,  64 => 16,  60 => 15,  56 => 13,  50 => 10,  47 => 9,  45 => 8,  42 => 7,  39 => 6,  32 => 3,  29 => 2,  11 => 1,);
    }
}
