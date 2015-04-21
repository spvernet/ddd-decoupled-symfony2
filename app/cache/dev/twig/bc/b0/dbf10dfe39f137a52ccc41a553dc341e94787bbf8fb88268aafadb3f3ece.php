<?php

/* NilPortuguesMyBoundedContextBundle:BlogPost:post.html.twig */
class __TwigTemplate_bcb0dbf10dfe39f137a52ccc41a553dc341e94787bbf8fb88268aafadb3f3ece extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "NilPortuguesMyBoundedContextBundle:BlogPost:post.html.twig", 1);
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
        if (array_key_exists("post", $context)) {
            // line 6
            echo "    <h1>Blog post</h1>
    <ul>
        <li><strong>Post Id:</strong> ";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "postId", array()), "html", null, true);
            echo "</li>
        <li><strong>Author Id:</strong> ";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "authorId", array()), "html", null, true);
            echo "</li>
        <li><strong>Created at:</strong> ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "createdAt", array()), "html", null, true);
            echo "</li>
        <li><strong>Title:</strong> ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "postTitle", array()), "html", null, true);
            echo "</li>
        <li><strong>Body:</strong> ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : $this->getContext($context, "post")), "postBody", array()), "html", null, true);
            echo "</li>
    </ul>
    ";
        } else {
            // line 15
            echo "        <h1>Error!</h1>
        <p>The following errors occurred:</p>
        <ul>
            ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["error_msg"]) ? $context["error_msg"] : $this->getContext($context, "error_msg")));
            foreach ($context['_seq'] as $context["_key"] => $context["errorMessage"]) {
                // line 19
                echo "                ";
                if (twig_test_iterable($context["errorMessage"])) {
                    // line 20
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($context["errorMessage"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["subErrorMessage"]) {
                        // line 21
                        echo "                        <li>";
                        echo twig_escape_filter($this->env, $context["subErrorMessage"], "html", null, true);
                        echo "</li>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subErrorMessage'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 23
                    echo "                ";
                } else {
                    // line 24
                    echo "                    <li>";
                    echo twig_escape_filter($this->env, $context["errorMessage"], "html", null, true);
                    echo "</li>
                ";
                }
                // line 26
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['errorMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "        </ul>
    ";
        }
        // line 29
        echo "    <br><br>
    <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("nil_portugues_my_bounded_context_homepage");
        echo "\">Back to homepage</a>
";
    }

    public function getTemplateName()
    {
        return "NilPortuguesMyBoundedContextBundle:BlogPost:post.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 30,  107 => 29,  103 => 27,  97 => 26,  91 => 24,  88 => 23,  79 => 21,  74 => 20,  71 => 19,  67 => 18,  62 => 15,  56 => 12,  52 => 11,  48 => 10,  44 => 9,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
