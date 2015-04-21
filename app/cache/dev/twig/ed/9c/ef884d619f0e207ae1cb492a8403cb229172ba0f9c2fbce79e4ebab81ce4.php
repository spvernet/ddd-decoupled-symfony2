<?php

/* NilPortuguesMyBoundedContextBundle:User:viewUser.html.twig */
class __TwigTemplate_ed9cef884d619f0e207ae1cb492a8403cb229172ba0f9c2fbce79e4ebab81ce4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "NilPortuguesMyBoundedContextBundle:User:viewUser.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 5
        if (array_key_exists("user", $context)) {
            // line 6
            echo "    <h1>User profile</h1>
    <ul>
        <li><strong>User Id:</strong> ";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
            echo "</li>
        <li><strong>Username:</strong> ";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array()), "html", null, true);
            echo "</li>
        <li><strong>Email:</strong> ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
            echo "</li>
        <li><strong>Registered on:</strong> ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "registeredOn", array()), "html", null, true);
            echo "</li>
    </ul>
    ";
        } else {
            // line 14
            echo "        <h1>Error!</h1>
        <p>The following errors occurred:</p>
        <ul>
        ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["error_msg"]) ? $context["error_msg"] : $this->getContext($context, "error_msg")));
            foreach ($context['_seq'] as $context["_key"] => $context["errorMessage"]) {
                // line 18
                echo "            ";
                if (twig_test_iterable($context["errorMessage"])) {
                    // line 19
                    echo "                ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($context["errorMessage"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["subErrorMessage"]) {
                        // line 20
                        echo "                    <li>";
                        echo twig_escape_filter($this->env, $context["subErrorMessage"], "html", null, true);
                        echo "</li>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subErrorMessage'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 22
                    echo "            ";
                } else {
                    // line 23
                    echo "                <li>";
                    echo twig_escape_filter($this->env, $context["errorMessage"], "html", null, true);
                    echo "</li>
            ";
                }
                // line 25
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['errorMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "        </ul>
    ";
        }
        // line 28
        echo "    <br><br>
    <a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_homepage");
        echo "\">Back to homepage</a>
";
    }

    public function getTemplateName()
    {
        return "NilPortuguesMyBoundedContextBundle:User:viewUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 29,  103 => 28,  99 => 26,  93 => 25,  87 => 23,  84 => 22,  75 => 20,  70 => 19,  67 => 18,  63 => 17,  58 => 14,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
