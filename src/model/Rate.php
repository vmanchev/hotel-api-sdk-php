<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 11/8/2015
 * Time: 1:41 AM
 */

namespace hotelbeds\hotel_api_sdk\model;

/**
 * Class Rate
 * @package hotelbeds\hotel_api_sdk\model
 * @property string rateKey Internal rate key to be used for confirmation
 * @property string rateClass Internal rate class type(NOR  NRF, SPE,OFE, PAQ ...)
 * @property string rateType If the booking can be confirmed in two steps (BOOKABLE) or three steps (RECHECK)
 * @property float net Room net price
 * @property float sellingRate Room gross price in case it is informed
 * @property integer allotment Number of rooms available for a particular room type use
 * @property float comission Comission for comissionable model
 * @property float comissionVAT Vat comission
 * @property float comissionPCT Percentage of the comission
 * @property integer rateCommentsId Rate comment id. Using the commentContract function a description is returned
 * @property string paymentType To identify if it is pay at hotel or merchant
 * @property string packaging Identifies if the rate is for packaging
 * @property string boardCode Internal board code
 * @property string boardName Board name
 * @property float hotelSellingRate Room gross price in hotelCurrency  (for pay at hotel model)
 * @property string hotelCurrency Hotel currency  (for pay at hotel model)
 * @property boolean hotelMandatory Identifies if the rate price is recommended
 * @property integer rooms Number of rooms requested with the same occupancy
 * @property integer adults Number of adults for the room
 * @property integer children Number of children requested
 * @property string childrenAges Children ages separated by commas
 * @property array cancellationPolicies List of cancellation policies
 * @property array taxes List of taxes
 * @property array promotions List of promotions
 */

class Rate extends ApiModel
{
    public function __construct(array $data=null)
    {
        // TODO: Falten camps per afegir: shifts

        $this->validFields =
            ["rateKey" => "string",
             "rateClass" => "string",
             "rateType" => "string",
             "net" => "float",
             "sellingRate" => "float",
             "allotment" => "integer",
             "comission" => "float",
             "comissionVAT" => "float",
             "comissionPCT" => "float",
             "rateCommentsId" => "integer",
             "paymentType" => "string",
             "packaging" => "string",
             "boardCode" => "string",
             "boardName" => "string",
             "hotelSellingRate" => "float",
             "hotelCurrency" => "string",
             "hotelMandatory" => "boolean",
             "rooms" => "integer",
             "adults" => "integer",
             "children" => "integer",
             "childrenAges" => "string",
             "cancellationPolicies" => "array",
             "taxes" => "array",
             "promotions" => "array"];

        if ($data !== null)
        {
            $this->fields = $data;
        }
    }

    /**
     * Get cancellation policies iterator for iterate all policies with models classes
     *
     * @return CancellationPoliciesIterator Return cancellation policies iterator
     */
    public function cancellationPoliciesIterator()
    {
        if ($this->cancellationPolicies !== null)
            return new CancellationPoliciesIterator($this->cancellationPolicies);
        return new CancellationPoliciesIterator([]);
    }

    /**
     * @return Taxes Return taxes class and list of all taxes
     */
    public function getTaxes()
    {
        return new Taxes($this->taxes);
    }

    /**
     * @return PromotionsIterator
     */
    public function promotionsIterator()
    {
        if ($this->promotions !== null)
            return new PromotionsIterator($this->promotions);
        return new PromotionsIterator([]);
    }
}