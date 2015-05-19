<?php

/* ::frontend.html.twig */
class __TwigTemplate_a16f6e4a448c4824f70b141895472f03c6320c77fb8e4a0b4d710860a5caebf0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "::frontend.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
            'article' => array($this, 'block_article'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/app/css/normalice.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/app/css/layout.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/app/css/frontend.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 8
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "
  <header>
    <h1><a id=\"logo\" href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("list");
        echo "\">mycats</a></h1>
    <nav>
      <ul>
        <li><a id=\"language_esp\" href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("list", array("_locale" => "es"));
        echo "\">
          <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/app/images/esp.png"), "html", null, true);
        echo "\"></a></li>
        <li><a id=\"language_eng\" href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("list", array("_locale" => "en"));
        echo "\">
          <img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/app/images/eng.png"), "html", null, true);
        echo "\"></a></li>

        ";
        // line 21
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 22
            echo "          <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("user_logout");
            echo "\">
            <strong>";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("session.close", array(), "menus"), "html", null, true);
            echo "</strong></a></li>
          <li><a href=\"";
            // line 24
            echo $this->env->getExtension('routing')->getPath("user_profile");
            echo "\">
            <strong>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "name", array()), "html", null, true);
            echo "</strong></a></li>
          <li><a id=\"newcat\" href=\"";
            // line 26
            echo $this->env->getExtension('routing')->getPath("new");
            echo "\">
            <strong>";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("new.cat", array(), "menus"), "html", null, true);
            echo "</strong></a></li>
          <li>";
            // line 28
            echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AppBundle:Show:selectBreeds"));
            echo "</li>
        ";
        }
        // line 30
        echo "
          ";
        // line 31
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 32
            echo "            <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("cpanel");
            echo "\">CPANEL</a></li>
          ";
        }
        // line 34
        echo "      </ul>
    </nav>
  </header>

";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 39
            echo "<div class=\"flash-notice\">
  ";
            // line 40
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "<article>
  ";
        // line 44
        $this->displayBlock('article', $context, $blocks);
        // line 45
        echo "</article>

";
    }

    // line 44
    public function block_article($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::frontend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 44,  154 => 45,  152 => 44,  149 => 43,  140 => 40,  137 => 39,  133 => 38,  127 => 34,  121 => 32,  119 => 31,  116 => 30,  111 => 28,  107 => 27,  103 => 26,  99 => 25,  95 => 24,  91 => 23,  86 => 22,  84 => 21,  79 => 19,  75 => 18,  71 => 17,  67 => 16,  61 => 13,  57 => 11,  54 => 10,  49 => 8,  43 => 6,  39 => 5,  34 => 4,  31 => 3,  11 => 1,);
    }
}
