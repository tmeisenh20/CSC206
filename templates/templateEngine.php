<?php


class templateEngine
{

    /**
     * Array of data to be inserted into the template
     * @var array|null
     */
    protected $data = [];

    /**
     * These are the data fields expected for this template. This
     * is a white list of fields.
     *
     * @var array
     */
    protected $whiteList = [];

    /**
     * This is the html code that makes up the template.  This will
     * be unique to and set in eacb instance of the class
     *
     * @var null
     */
    protected $template = null;

    /**
     * Nothing that needs to be done at this point.  The specific template
     * files will use the constructor to set the data property.
     *
     * templateEngine constructor.
     */
    public function __construct()
    {

    }

    /**
     * Add the data for the page to the template engine.  An array is expected here because we will
     * be adding multiple values per page 99% of the time.  The input data is associative
     * with key / value pairs.  It can be a 2D array if you have a list of things to render in a
     * content section.
     *
     * @param array $inputData
     * @return $this|bool
     */
    public function data(Array $inputData)
    {
        // Array of data expected
        if (!is_array($inputData)) return false;

        // Save the data in
        $this->data = $inputData;

        // Return the object to support method chaining
        return $this;

    }


    /**
     * Insert the page data into the template
     *
     * @return mixed|string
     */
    public function render($data = null)
    {
        $templateData = is_null($data) ? $this->data : $data;

        $html = $this->template;
        // Substitute the actual values into the token locations
        foreach ($templateData as $key => $value) {
            $token = '{{' . $key . '}}';  //   {{content}}
            $html = str_replace($token, $value, $html);
        }

        return $html;
    }

    /**
     * If there is a list of content blocks to render, this method will parse
     * a 2D array and render each content block
     * @return string
     */
    public function renderList()
    {
        $html = '';

        foreach ($this->data as $listItem) {

            $html .= $this->render($listItem);

        }

        return $html;
    }

    /**
     * If this content block is static then just return it.  Examples may
     * include the footer or a static page of data like an About Us page.
     *
     * @return null
     */
    public function renderStatic()
    {
        return $this->template;
    }


    /**
     * Loop through the data and remove values that aren't on
     * the expected whiteList of values.  This is primarily for security
     * purposes to remove illegal data from the page.
     *
     * @param array $data
     * @return array
     */
    protected function clean(Array $data)
    {
        foreach ($data as $key => $value) {

            // If the input data has a value that isn't in the whiteList, remove it from the array
            if (!array_key_exists($key, $this->whiteList)) {
                unset($data[$key]);
            }
        }

        return $data;
    }


}