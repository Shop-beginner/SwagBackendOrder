<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwagBackendOrder;

use Shopware\Components\Plugin;

class SwagBackendOrder extends Plugin
{
//    /**
//     * @return array|bool
//     * @throws Exception
//     */
//    public function install()
//    {
//        // Check if shopware version matches
//        if (!$this->assertMinimumVersion($this->getMinimumVersion())) {
//            throw new Exception(
//                sprintf("This plugin requires Shopware %s or a later version", $this->getMinimumVersion())
//            );
//        }
//
//        $this->createConfiguration();
//
//        $this->registerEvents();
//
//        return ['success' => true, 'invalidateCache' => ['backend']];
//    }
//
//    /**
//     * @return array|bool
//     */
//    public function uninstall()
//    {
//        return ['success' => true, 'invalidateCache' => ['backend']];
//    }
//
//
//    /**
//     * function to register events and hooks
//     */
//    private function registerEvents()
//    {
//        $this->subscribeEvent(
//            'Enlight_Controller_Dispatcher_ControllerPath_Backend_SwagBackendOrder',
//            'onGetBackendController'
//        );
//
//        $this->subscribeEvent(
//            'Enlight_Controller_Action_PostDispatch_Backend_Order',
//            'onOrderPostDispatch'
//        );
//
//        $this->subscribeEvent(
//            'Enlight_Controller_Action_PostDispatchSecure_Backend_Customer',
//            'onCustomerPostDispatchSecure'
//        );
//
//        $this->subscribeEvent(
//            'Enlight_Controller_Action_PostDispatch_Backend_Customer',
//            'onPostDispatchCustomer'
//        );
//
//        // Register CreateBackendOrder-Resource
//        $this->subscribeEvent(
//            'Enlight_Bootstrap_InitResource_CreateBackendOrder',
//            'onInitCreateBackendOrderResource'
//        );
//
//        // Register CustomerInformationHandler-Resource
//        $this->subscribeEvent(
//            'Enlight_Bootstrap_InitResource_CustomerInformationHandler',
//            'onInitCustomerInformationHandlerResource'
//        );
//    }
//
//    /**
//     * checks if the fake email was used to create accounts with the same email
//     *
//     * @param Enlight_Controller_ActionEventArgs $arguments
//     * @return bool
//     */
//    public function onPostDispatchCustomer(Enlight_Controller_ActionEventArgs $arguments)
//    {
//        $mail = $arguments->getSubject()->Request()->getParam('value');
//        $action = $arguments->getSubject()->Request()->getParam('action');
//
//        if (!empty($mail) && $action !== 'validateEmail') {
//            if ($this->Config()->get('validationMail') == $mail) {
//                Shopware()->Plugins()->Controller()->ViewRenderer()->setNoRender();
//                echo true;
//
//                return true;
//            }
//        }
//    }
//
//    /**
//     * adds the templates and snippets dir
//     *
//     * @return string
//     */
//    public function onGetBackendController()
//    {
//        $this->get('template')->addTemplateDir($this->Path() . 'Views/');
//        $this->get('snippets')->addConfigDir($this->Path() . 'Snippets/');
//
//        return $this->Path() . '/Controllers/Backend/SwagBackendOrder.php';
//    }
//
//    /**
//     * adds the templates directories which expand the order module
//     *
//     * @param Enlight_Controller_ActionEventArgs $args
//     */
//    public function onOrderPostDispatch(Enlight_Controller_ActionEventArgs $args)
//    {
//        $view = $args->getSubject()->View();
//
//        // Add view directory
//        $args->getSubject()->View()->addTemplateDir(
//            $this->Path() . 'Views/'
//        );
//
//        if ($args->getRequest()->getActionName() === 'load') {
//            $view->extendsTemplate(
//                'backend/order/view/create_backend_order/list.js'
//            );
//        }
//    }
//
//    /**
//     * adds the templates directories which expand the customer module
//     *
//     * @param Enlight_Controller_ActionEventArgs $args
//     */
//    public function onCustomerPostDispatchSecure(Enlight_Controller_ActionEventArgs $args)
//    {
//        $view = $args->getSubject()->View();
//
//        $args->getSubject()->View()->addTemplateDir($this->Path() . 'Views/');
//
//        if ($args->getRequest()->getActionName() === 'load') {
//            $view->extendsTemplate('backend/customer/controller/create_backend_order/detail.js');
//            $view->extendsTemplate('backend/customer/controller/create_backend_order/main.js');
//            $view->extendsTemplate('backend/customer/view/create_backend_order/detail/base.js');
//            $view->extendsTemplate('backend/customer/view/create_backend_order/detail/additional.js');
//            $view->extendsTemplate('backend/customer/view/create_backend_order/detail/window.js');
//        }
//    }
//
//    /**
//     * gets the plugin json and decodes it
//     *
//     * @return mixed
//     */
//    private function getPluginJson()
//    {
//        $pluginInfo = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'plugin.json'), true);
//
//        return $pluginInfo;
//    }
//
//    /**
//     * Event listener function of the Enlight_Bootstrap_InitResource_CreateBackendOrder event.
//     * Fired on $this->Application->CreateBackendOrder();
//     *
//     * @return Shopware_Components_CreateBackendOrder
//     */
//    public function onInitCreateBackendOrderResource()
//    {
//        $this->Application()->Loader()->registerNamespace('Shopware_Components', $this->Path() . 'Components/');
//
//        $createBackendOrder = Enlight_Class::Instance('Shopware_Components_CreateBackendOrder');
//        $this->getShopwareBootstrap()->registerResource('CreateBackendOrder', $createBackendOrder);
//
//        return $createBackendOrder;
//    }
//
//    /**
//     * @return Shopware_Components_CustomerInformationHandler
//     */
//    public function onInitCustomerInformationHandlerResource()
//    {
//        $this->Application()->Loader()->registerNamespace('Shopware_Components', $this->Path() . 'Components/');
//
//        $customerInformationHandler = Enlight_Class::Instance('Shopware_Components_CustomerInformationHandler');
//        $this->getShopwareBootstrap()->registerResource('CustomerInformationHandler', $customerInformationHandler);
//
//        return $customerInformationHandler;
//    }
//
//    /**
//     * Shopware application bootstrap class.
//     *
//     * Used to register plugin components.
//     *
//     * @return Enlight_Bootstrap
//     */
//    public function getShopwareBootstrap()
//    {
//        return $this->Application()->Bootstrap();
//    }
//
//    /**
//     * @param string $oldVersion
//     * @return bool
//     * @throws Exception
//     */
//    public function update($oldVersion)
//    {
//        if (!$this->assertMinimumVersion($this->getMinimumVersion())) {
//            throw new Exception(
//                sprintf('This plugin requires Shopware %s or a later version', $this->getMinimumVersion())
//            );
//        }
//
//        if (version_compare($oldVersion, '1.0.1', '<')) {
//            $orderDetailIds = Shopware()->Db()->fetchCol(
//                'SELECT id FROM s_order_details WHERE id NOT IN (SELECT detailID FROM s_order_details_attributes);'
//            );
//            foreach ($orderDetailIds as $orderDetailId) {
//                $sql = 'INSERT INTO `s_order_details_attributes` (detailID) VALUES (?)';
//                Shopware()->Db()->query($sql, [$orderDetailId]);
//            }
//        }
//
//        return true;
//    }
}
